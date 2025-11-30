<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MahasiswaModel;
use App\Models\UserModel;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;
    protected $userModel;
    
    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->userModel = new UserModel();
    }
    
    public function index()
    {
        // Disable cache untuk halaman ini
        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $this->response->setHeader('Pragma', 'no-cache');
        
        // Auto-sync: Cek dan perbaiki sinkronisasi data
        $syncResult = $this->autoSyncData();
        
        // Get database connection
        $db = \Config\Database::connect();
        
        // Get paginated data with fresh query
        $data['mahasiswa'] = $this->mahasiswaModel->orderBy('nim', 'ASC')->paginate(10);
        $data['pager'] = $this->mahasiswaModel->pager;
        
        // Get total count with fresh query
        $data['total'] = $db->table('mahasiswa')->countAll();
        
        // Add sync info to data
        $data['sync_info'] = $syncResult;
        
        return view('admin/mahasiswa/index', $data);
    }
    
    /**
     * Auto-sync data mahasiswa dan user
     * Otomatis memperbaiki jika ada data yang tidak sinkron
     * @return array Info tentang sinkronisasi
     */
    private function autoSyncData()
    {
        $db = \Config\Database::connect();
        $syncCount = 0;
        $syncedData = [];
        
        try {
            // 1. Cari user mahasiswa yang tidak ada di tabel mahasiswa
            $query = "
                SELECT u.username, u.nama_user 
                FROM user u 
                LEFT JOIN mahasiswa m ON u.username = m.nim 
                WHERE u.role = 'mahasiswa' AND m.nim IS NULL
            ";
            
            $result = $db->query($query);
            $usersWithoutMahasiswa = $result->getResultArray();
            
            // 2. Tambahkan data mahasiswa yang hilang
            if (!empty($usersWithoutMahasiswa)) {
                foreach ($usersWithoutMahasiswa as $user) {
                    // Insert langsung ke database untuk memastikan tersimpan
                    $db->table('mahasiswa')->insert([
                        'nim' => $user['username'],
                        'nama' => $user['nama_user']
                    ]);
                    
                    $syncCount++;
                    $syncedData[] = $user['username'] . ' - ' . $user['nama_user'];
                    log_message('info', 'Auto-sync: Menambahkan mahasiswa ' . $user['username']);
                }
                
                // Set flash message untuk notifikasi
                if ($syncCount > 0) {
                    session()->setFlashdata('info', "✅ Sistem otomatis memperbaiki $syncCount data yang tidak sinkron: " . implode(', ', $syncedData));
                }
            }
            
            // 3. Cari mahasiswa yang tidak punya user
            $query = "
                SELECT m.nim, m.nama 
                FROM mahasiswa m 
                LEFT JOIN user u ON m.nim = u.username 
                WHERE u.username IS NULL
            ";
            
            $result = $db->query($query);
            $mahasiswaWithoutUser = $result->getResultArray();
            
            if (!empty($mahasiswaWithoutUser)) {
                foreach ($mahasiswaWithoutUser as $mhs) {
                    log_message('warning', 'Mahasiswa tanpa user: ' . $mhs['nim'] . ' - ' . $mhs['nama']);
                }
            }
            
        } catch (\Exception $e) {
            log_message('error', 'Auto-sync error: ' . $e->getMessage());
        }
        
        return [
            'synced' => $syncCount,
            'data' => $syncedData
        ];
    }
    
    public function create()
    {
        return view('admin/mahasiswa/create');
    }
    
    public function store()
    {
        // Validasi input
        $rules = [
            'nim' => [
                'rules' => 'required|is_unique[mahasiswa.nim]|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'NIM harus diisi',
                    'is_unique' => 'NIM sudah terdaftar, gunakan NIM lain',
                    'min_length' => 'NIM minimal 5 karakter',
                    'max_length' => 'NIM maksimal 20 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'min_length' => 'Nama minimal 3 karakter'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 6 karakter'
                ]
            ]
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $nim = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');
        
        // Cek apakah NIM sudah ada di tabel user
        $existingUser = $this->userModel->where('username', $nim)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'NIM sudah terdaftar sebagai user');
        }
        
        $this->mahasiswaModel->save([
            'nim' => $nim,
            'nama' => $nama
        ]);
        
        $this->userModel->save([
            'nama_user' => $nama,
            'username' => $nim,
            'password' => $password,
            'role' => 'mahasiswa'
        ]);
        
        return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }
    
    public function edit($nim)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->find($nim);
        return view('admin/mahasiswa/edit', $data);
    }
    
    public function update($nim)
    {
        $nama = $this->request->getPost('nama');
        
        $this->mahasiswaModel->update($nim, ['nama' => $nama]);
        
        $this->userModel->where('username', $nim)->set(['nama_user' => $nama])->update();
        
        return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil diupdate');
    }
    
    public function delete($nim)
    {
        $this->userModel->where('username', $nim)->delete();
        $this->mahasiswaModel->delete($nim);
        return redirect()->to('/admin/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}

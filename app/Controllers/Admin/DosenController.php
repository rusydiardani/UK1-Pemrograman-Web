<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DosenModel;
use App\Models\UserModel;

class DosenController extends BaseController
{
    protected $dosenModel;
    protected $userModel;
    
    public function __construct()
    {
        $this->dosenModel = new DosenModel();
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
        $data['dosen'] = $this->dosenModel->orderBy('nidn', 'ASC')->paginate(10);
        $data['pager'] = $this->dosenModel->pager;
        
        // Get total count with fresh query
        $data['total'] = $db->table('dosen')->countAll();
        
        // Add sync info to data
        $data['sync_info'] = $syncResult;
        
        return view('admin/dosen/index', $data);
    }
    
    /**
     * Auto-sync data dosen dan user
     * @return array Info tentang sinkronisasi
     */
    private function autoSyncData()
    {
        $db = \Config\Database::connect();
        $syncCount = 0;
        $syncedData = [];
        
        try {
            // Cari user dosen yang tidak ada di tabel dosen
            $query = "
                SELECT u.username, u.nama_user 
                FROM user u 
                LEFT JOIN dosen d ON u.username = d.nidn 
                WHERE u.role = 'dosen' AND d.nidn IS NULL
            ";
            
            $result = $db->query($query);
            $usersWithoutDosen = $result->getResultArray();
            
            // Tambahkan data dosen yang hilang
            if (!empty($usersWithoutDosen)) {
                foreach ($usersWithoutDosen as $user) {
                    // Insert langsung ke database
                    $db->table('dosen')->insert([
                        'nidn' => $user['username'],
                        'nama' => $user['nama_user']
                    ]);
                    
                    $syncCount++;
                    $syncedData[] = $user['username'] . ' - ' . $user['nama_user'];
                    log_message('info', 'Auto-sync: Menambahkan dosen ' . $user['username']);
                }
                
                // Set flash message untuk notifikasi
                if ($syncCount > 0) {
                    session()->setFlashdata('info', "✅ Sistem otomatis memperbaiki $syncCount data yang tidak sinkron: " . implode(', ', $syncedData));
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
        return view('admin/dosen/create');
    }
    
    public function store()
    {
        // Validasi input
        $rules = [
            'nidn' => [
                'rules' => 'required|is_unique[dosen.nidn]|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'NIDN harus diisi',
                    'is_unique' => 'NIDN sudah terdaftar, gunakan NIDN lain',
                    'min_length' => 'NIDN minimal 5 karakter',
                    'max_length' => 'NIDN maksimal 20 karakter'
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
        
        $nidn = $this->request->getPost('nidn');
        $nama = $this->request->getPost('nama');
        $password = $this->request->getPost('password');
        
        // Cek apakah NIDN sudah ada di tabel user
        $existingUser = $this->userModel->where('username', $nidn)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'NIDN sudah terdaftar sebagai user');
        }
        
        $this->dosenModel->save([
            'nidn' => $nidn,
            'nama' => $nama
        ]);
        
        $this->userModel->save([
            'nama_user' => $nama,
            'username' => $nidn,
            'password' => $password,
            'role' => 'dosen'
        ]);
        
        return redirect()->to('/admin/dosen')->with('success', 'Data dosen berhasil ditambahkan');
    }
    
    public function edit($nidn)
    {
        $data['dosen'] = $this->dosenModel->find($nidn);
        return view('admin/dosen/edit', $data);
    }
    
    public function update($nidn)
    {
        $nama = $this->request->getPost('nama');
        
        $this->dosenModel->update($nidn, ['nama' => $nama]);
        $this->userModel->where('username', $nidn)->set(['nama_user' => $nama])->update();
        
        return redirect()->to('/admin/dosen')->with('success', 'Data dosen berhasil diupdate');
    }
    
    public function delete($nidn)
    {
        $this->userModel->where('username', $nidn)->delete();
        $this->dosenModel->delete($nidn);
        return redirect()->to('/admin/dosen')->with('success', 'Data dosen berhasil dihapus');
    }
}

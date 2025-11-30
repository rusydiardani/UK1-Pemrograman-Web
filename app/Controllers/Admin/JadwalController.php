<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\MataKuliahModel;
use App\Models\RuanganModel;
use App\Models\DosenModel;

class JadwalController extends BaseController
{
    protected $jadwalModel;
    
    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
    }
    
    public function index()
    {
        // Disable cache
        $this->response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $this->response->setHeader('Pragma', 'no-cache');
        
        $db = \Config\Database::connect();
        
        // Get paginated data
        $builder = $db->table('jadwal')
            ->select('jadwal.*, mata_kuliah.nama_mata_kuliah, mata_kuliah.kode_mata_kuliah, mata_kuliah.sks, ruangan.nama_ruangan, dosen.nama as nama_dosen')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal.id_ruangan')
            ->join('dosen', 'dosen.nidn = jadwal.nidn')
            ->orderBy('jadwal.id', 'ASC');
        
        $data['jadwal'] = $builder->get()->getResultArray();
        $data['total'] = $db->table('jadwal')->countAll();
        
        // For pagination (if needed later)
        $data['pager'] = null;
        
        return view('admin/jadwal/index', $data);
    }
    
    public function create()
    {
        $data['mata_kuliah'] = (new MataKuliahModel())->findAll();
        $data['ruangan'] = (new RuanganModel())->findAll();
        $data['dosen'] = (new DosenModel())->findAll();
        return view('admin/jadwal/create', $data);
    }
    
    public function store()
    {
        $this->jadwalModel->save([
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'id_mata_kuliah' => $this->request->getPost('id_mata_kuliah'),
            'id_ruangan' => $this->request->getPost('id_ruangan'),
            'nidn' => $this->request->getPost('nidn'),
            'hari' => $this->request->getPost('hari'),
            'jam' => $this->request->getPost('jam')
        ]);
        
        return redirect()->to('/admin/jadwal')->with('success', 'Data jadwal berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        $data['jadwal'] = $this->jadwalModel->find($id);
        $data['mata_kuliah'] = (new MataKuliahModel())->findAll();
        $data['ruangan'] = (new RuanganModel())->findAll();
        $data['dosen'] = (new DosenModel())->findAll();
        return view('admin/jadwal/edit', $data);
    }
    
    public function update($id)
    {
        $this->jadwalModel->update($id, [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'id_mata_kuliah' => $this->request->getPost('id_mata_kuliah'),
            'id_ruangan' => $this->request->getPost('id_ruangan'),
            'nidn' => $this->request->getPost('nidn'),
            'hari' => $this->request->getPost('hari'),
            'jam' => $this->request->getPost('jam')
        ]);
        
        return redirect()->to('/admin/jadwal')->with('success', 'Data jadwal berhasil diupdate');
    }
    
    public function delete($id)
    {
        $this->jadwalModel->delete($id);
        return redirect()->to('/admin/jadwal')->with('success', 'Data jadwal berhasil dihapus');
    }
}

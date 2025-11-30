<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\RencanaStudiModel;
use App\Models\JadwalModel;

class RencanaStudiController extends BaseController
{
    protected $rencanaStudiModel;
    
    public function __construct()
    {
        $this->rencanaStudiModel = new RencanaStudiModel();
    }
    
    public function index()
    {
        $nim = session()->get('nim');
        $data['rencana_studi'] = $this->rencanaStudiModel->getRencanaStudiByMahasiswa($nim);
        return view('mahasiswa/rencana_studi/index', $data);
    }
    
    public function create()
    {
        $jadwalModel = new JadwalModel();
        $nim = session()->get('nim');
        
        // Get jadwal yang belum diambil
        $allJadwal = $jadwalModel->getJadwalWithDetails();
        $takenJadwal = $this->rencanaStudiModel->where('nim', $nim)->findAll();
        $takenIds = array_column($takenJadwal, 'id_jadwal');
        
        $data['jadwal'] = array_filter($allJadwal, function($j) use ($takenIds) {
            return !in_array($j['id'], $takenIds);
        });
        
        return view('mahasiswa/rencana_studi/create', $data);
    }
    
    public function store()
    {
        $nim = session()->get('nim');
        $id_jadwal = $this->request->getPost('id_jadwal');
        
        $this->rencanaStudiModel->save([
            'nim' => $nim,
            'id_jadwal' => $id_jadwal
        ]);
        
        return redirect()->to('/mahasiswa/rencana-studi')->with('success', 'Mata kuliah berhasil ditambahkan');
    }
    
    public function delete($id)
    {
        $this->rencanaStudiModel->delete($id);
        return redirect()->to('/mahasiswa/rencana-studi')->with('success', 'Mata kuliah berhasil dihapus');
    }
}

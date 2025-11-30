<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\RencanaStudiModel;
use App\Models\JadwalModel;
use App\Models\NilaiMutuModel;

class NilaiController extends BaseController
{
    public function index($id_jadwal)
    {
        $rencanaStudiModel = new RencanaStudiModel();
        $jadwalModel = new JadwalModel();
        $nilaiMutuModel = new NilaiMutuModel();
        
        $data['jadwal'] = $jadwalModel->getJadwalWithDetails();
        $data['jadwal'] = array_filter($data['jadwal'], function($j) use ($id_jadwal) {
            return $j['id'] == $id_jadwal;
        });
        $data['jadwal'] = reset($data['jadwal']);
        
        $data['mahasiswa'] = $rencanaStudiModel->getMahasiswaByJadwal($id_jadwal);
        $data['nilai_mutu'] = $nilaiMutuModel->findAll();
        
        return view('dosen/nilai/index', $data);
    }
    
    public function update()
    {
        $rencanaStudiModel = new RencanaStudiModel();
        $id_rencana_studi = $this->request->getPost('id_rencana_studi');
        $nilai_angka = $this->request->getPost('nilai_angka');
        $nilai_huruf = $this->request->getPost('nilai_huruf');
        
        foreach ($id_rencana_studi as $key => $id) {
            $rencanaStudiModel->update($id, [
                'nilai_angka' => $nilai_angka[$key],
                'nilai_huruf' => $nilai_huruf[$key]
            ]);
        }
        
        return redirect()->back()->with('success', 'Nilai berhasil disimpan');
    }
}

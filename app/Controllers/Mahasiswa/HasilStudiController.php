<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\RencanaStudiModel;
use App\Models\NilaiMutuModel;

class HasilStudiController extends BaseController
{
    public function index()
    {
        $nim = session()->get('nim');
        $rencanaStudiModel = new RencanaStudiModel();
        $nilaiMutuModel = new NilaiMutuModel();
        
        $rencanaStudi = $rencanaStudiModel->getRencanaStudiByMahasiswa($nim);
        
        // Calculate IPK
        $totalNilaiMutu = 0;
        $totalSks = 0;
        
        foreach ($rencanaStudi as &$rs) {
            if ($rs['nilai_huruf']) {
                $nilaiMutu = $nilaiMutuModel->find($rs['nilai_huruf']);
                if ($nilaiMutu) {
                    $rs['nilai_mutu'] = $nilaiMutu['nilai_mutu'];
                    $totalNilaiMutu += $nilaiMutu['nilai_mutu'] * $rs['sks'];
                    $totalSks += $rs['sks'];
                }
            }
        }
        
        $ipk = $totalSks > 0 ? $totalNilaiMutu / $totalSks : 0;
        
        $data['rencana_studi'] = $rencanaStudi;
        $data['ipk'] = number_format($ipk, 2);
        $data['total_sks'] = $totalSks;
        
        return view('mahasiswa/hasil_studi/index', $data);
    }
}

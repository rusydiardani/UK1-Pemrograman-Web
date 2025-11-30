<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\JadwalModel;

class JadwalController extends BaseController
{
    public function index()
    {
        $nidn = session()->get('nidn');
        $jadwalModel = new JadwalModel();
        
        $data['jadwal'] = $jadwalModel->getJadwalByDosen($nidn);
        return view('dosen/jadwal/index', $data);
    }
}

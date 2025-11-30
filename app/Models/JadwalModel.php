<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kelas', 'id_mata_kuliah', 'id_ruangan', 'nidn', 'hari', 'jam'];
    protected $useTimestamps = false;
    
    public function getJadwalWithDetails()
    {
        return $this->select('jadwal.*, mata_kuliah.nama_mata_kuliah, mata_kuliah.kode_mata_kuliah, mata_kuliah.sks, ruangan.nama_ruangan, dosen.nama as nama_dosen')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal.id_ruangan')
            ->join('dosen', 'dosen.nidn = jadwal.nidn')
            ->findAll();
    }
    
    public function getJadwalByDosen($nidn)
    {
        return $this->select('jadwal.*, mata_kuliah.nama_mata_kuliah, mata_kuliah.kode_mata_kuliah, mata_kuliah.sks, ruangan.nama_ruangan')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal.id_ruangan')
            ->where('jadwal.nidn', $nidn)
            ->findAll();
    }
}

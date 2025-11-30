<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_dosen') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard Dosen</h2>
                
                <?php 
                $jadwalModel = new \App\Models\JadwalModel();
                $nidn = session()->get('nidn');
                $jadwalDosen = $jadwalModel->where('nidn', $nidn)->findAll();
                $totalJadwal = count($jadwalDosen);
                ?>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Jadwal Mengajar</h6>
                                        <h2><?= $totalJadwal ?></h2>
                                    </div>
                                    <i class="bi bi-calendar3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="bi bi-person-badge"></i> Selamat Datang, <?= session()->get('nama_user') ?>!</h5>
                                <p>NIDN: <strong><?= session()->get('nidn') ?></strong></p>
                                <hr>
                                <h6>Menu yang tersedia:</h6>
                                <ul>
                                    <li><strong>Jadwal Mengajar:</strong> Lihat jadwal mengajar Anda</li>
                                    <li><strong>Input Nilai:</strong> Berikan nilai kepada mahasiswa di kelas Anda</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>

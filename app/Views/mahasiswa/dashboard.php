<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_mahasiswa') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard Mahasiswa</h2>
                
                <?php 
                $rencanaStudiModel = new \App\Models\RencanaStudiModel();
                $nim = session()->get('nim');
                $rencanaStudi = $rencanaStudiModel->where('nim', $nim)->findAll();
                $totalSks = 0;
                $mataKuliahDiambil = count($rencanaStudi);
                ?>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Mata Kuliah Diambil</h6>
                                        <h2><?= $mataKuliahDiambil ?></h2>
                                    </div>
                                    <i class="bi bi-journal-text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><i class="bi bi-person-circle"></i> Selamat Datang, <?= session()->get('nama_user') ?>!</h5>
                                <p>NIM: <strong><?= session()->get('nim') ?></strong></p>
                                <hr>
                                <h6>Menu yang tersedia:</h6>
                                <ul>
                                    <li><strong>Rencana Studi:</strong> Tambah atau hapus mata kuliah yang akan diambil</li>
                                    <li><strong>Hasil Studi:</strong> Lihat nilai dan IPK Anda</li>
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

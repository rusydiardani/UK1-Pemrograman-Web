<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>

        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard Admin</h2>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card stat-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Total Mahasiswa</h6>
                                        <h2><?= (new \App\Models\MahasiswaModel())->countAll() ?></h2>
                                    </div>
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Total Dosen</h6>
                                        <h2><?= (new \App\Models\DosenModel())->countAll() ?></h2>
                                    </div>
                                    <i class="bi bi-person-badge"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Total Ruangan</h6>
                                        <h2><?= (new \App\Models\RuanganModel())->countAll() ?></h2>
                                    </div>
                                    <i class="bi bi-door-open"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Total Jadwal</h6>
                                        <h2><?= (new \App\Models\JadwalModel())->countAll() ?></h2>
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
                                <h5 class="card-title mb-4"><i class="bi bi-info-circle"></i> Selamat Datang, <?= session()->get('nama_user') ?>!</h5>
                                <p>Anda login sebagai <strong>Administrator</strong>. Gunakan menu di sebelah kiri untuk mengelola data sistem perkuliahan.</p>
                                <hr>
                                <h6>Fitur yang tersedia:</h6>
                                <ul>
                                    <li>Manajemen Data Mahasiswa</li>
                                    <li>Manajemen Data Dosen</li>
                                    <li>Manajemen Data Ruangan</li>
                                    <li>Manajemen Jadwal Kuliah</li>
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
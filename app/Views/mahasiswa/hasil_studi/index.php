<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_mahasiswa') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-trophy"></i> Hasil Studi</h2>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h6>Indeks Prestasi Kumulatif (IPK)</h6>
                                <h1 class="display-4"><?= $ipk ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="card-body">
                                <h6>Total SKS Diambil</h6>
                                <h1 class="display-4"><?= $total_sks ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Detail Nilai</h5>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode MK</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Kelas</th>
                                        <th>Dosen</th>
                                        <th>Nilai Angka</th>
                                        <th>Nilai Huruf</th>
                                        <th>Nilai Mutu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($rencana_studi)): ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Belum ada data nilai</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1; foreach($rencana_studi as $rs): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><span class="badge bg-info"><?= $rs['kode_mata_kuliah'] ?></span></td>
                                            <td><?= $rs['nama_mata_kuliah'] ?></td>
                                            <td><?= $rs['sks'] ?> SKS</td>
                                            <td><?= $rs['nama_kelas'] ?></td>
                                            <td><?= $rs['nama_dosen'] ?></td>
                                            <td>
                                                <?php if($rs['nilai_angka']): ?>
                                                    <?= $rs['nilai_angka'] ?>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Belum dinilai</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($rs['nilai_huruf']): ?>
                                                    <span class="badge bg-success"><?= $rs['nilai_huruf'] ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(isset($rs['nilai_mutu'])): ?>
                                                    <?= $rs['nilai_mutu'] ?>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>

<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_dosen') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-calendar3"></i> Jadwal Mengajar</h2>
                
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode MK</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Kelas</th>
                                        <th>Ruangan</th>
                                        <th>Jadwal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($jadwal)): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada jadwal mengajar</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1; foreach($jadwal as $j): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><span class="badge bg-info"><?= $j['kode_mata_kuliah'] ?></span></td>
                                            <td><?= $j['nama_mata_kuliah'] ?></td>
                                            <td><?= $j['sks'] ?> SKS</td>
                                            <td><span class="badge bg-primary"><?= $j['nama_kelas'] ?></span></td>
                                            <td><?= $j['nama_ruangan'] ?></td>
                                            <td><?= $j['hari'] ?>, <?= $j['jam'] ?></td>
                                            <td>
                                                <a href="<?= base_url('dosen/nilai/'.$j['id']) ?>" class="btn btn-sm btn-success">
                                                    <i class="bi bi-pencil-square"></i> Input Nilai
                                                </a>
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

<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_mahasiswa') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2><i class="bi bi-journal-text"></i> Rencana Studi</h2>
                    <a href="<?= base_url('mahasiswa/rencana-studi/create') ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Tambah Mata Kuliah
                    </a>
                </div>
                
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
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
                                        <th>Dosen</th>
                                        <th>Ruangan</th>
                                        <th>Jadwal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($rencana_studi)): ?>
                                        <tr>
                                            <td colspan="9" class="text-center">Belum ada mata kuliah yang diambil</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1; $totalSks = 0; foreach($rencana_studi as $rs): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><span class="badge bg-info"><?= $rs['kode_mata_kuliah'] ?></span></td>
                                            <td><?= $rs['nama_mata_kuliah'] ?></td>
                                            <td><?= $rs['sks'] ?> SKS</td>
                                            <td><?= $rs['nama_kelas'] ?></td>
                                            <td><?= $rs['nama_dosen'] ?></td>
                                            <td><?= $rs['nama_ruangan'] ?></td>
                                            <td><?= $rs['hari'] ?>, <?= $rs['jam'] ?></td>
                                            <td>
                                                <a href="<?= base_url('mahasiswa/rencana-studi/delete/'.$rs['id_rencana_studi']) ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $totalSks += $rs['sks']; endforeach; ?>
                                        <tr class="table-info">
                                            <td colspan="3" class="text-end"><strong>Total SKS:</strong></td>
                                            <td colspan="6"><strong><?= $totalSks ?> SKS</strong></td>
                                        </tr>
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

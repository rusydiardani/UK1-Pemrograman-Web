<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2><i class="bi bi-calendar3"></i> Data Jadwal</h2>
                        <p class="text-muted mb-0">Total: <strong><?= $total ?></strong> jadwal</p>
                    </div>
                    <div>
                        <a href="<?= base_url('admin/jadwal') ?>" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-clockwise"></i> Refresh
                        </a>
                        <a href="<?= base_url('admin/jadwal/create') ?>" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Jadwal
                        </a>
                    </div>
                </div>
                
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle-fill me-2"></i>
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
                                        <th>Kelas</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Dosen</th>
                                        <th>Ruangan</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($jadwal)): ?>
                                        <tr>
                                            <td colspan="9" class="text-center py-5">
                                                <i class="bi bi-inbox" style="font-size: 3rem; color: #9ca3af;"></i>
                                                <p class="text-muted mt-2">Belum ada data jadwal</p>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1; foreach($jadwal as $j): ?>
                                        <tr>
                                            <td><span class="badge bg-light text-dark"><?= $no++ ?></span></td>
                                            <td><span class="badge bg-primary"><?= $j['nama_kelas'] ?></span></td>
                                            <td>
                                                <strong><?= $j['kode_mata_kuliah'] ?></strong><br>
                                                <small><?= $j['nama_mata_kuliah'] ?></small>
                                            </td>
                                            <td><?= $j['sks'] ?> SKS</td>
                                            <td><?= $j['nama_dosen'] ?></td>
                                            <td><?= $j['nama_ruangan'] ?></td>
                                            <td><?= $j['hari'] ?></td>
                                            <td><?= $j['jam'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/jadwal/edit/'.$j['id']) ?>" 
                                                   class="btn btn-sm btn-warning me-1">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <a href="<?= base_url('admin/jadwal/delete/'.$j['id']) ?>" 
                                                   class="btn btn-sm btn-danger" 
                                                   onclick="return confirm('Yakin ingin menghapus jadwal <?= $j['nama_kelas'] ?> - <?= $j['nama_mata_kuliah'] ?>?')">
                                                    <i class="bi bi-trash"></i> Hapus
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

<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2><i class="bi bi-person-badge"></i> Data Dosen</h2>
                        <p class="text-muted mb-0">
                            Total: <strong><?= $total ?></strong> dosen
                            <?php if(isset($sync_info) && $sync_info['synced'] > 0): ?>
                                <span class="badge bg-info ms-2">
                                    <i class="bi bi-arrow-repeat"></i> <?= $sync_info['synced'] ?> data disinkronkan
                                </span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div>
                        <a href="<?= base_url('admin/dosen') ?>" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-clockwise"></i> Refresh
                        </a>
                        <a href="<?= base_url('admin/dosen/create') ?>" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Dosen
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
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if(session()->getFlashdata('info')): ?>
                    <div class="alert alert-info alert-dismissible fade show">
                        <i class="bi bi-info-circle-fill me-2"></i>
                        <?= session()->getFlashdata('info') ?>
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
                                        <th>NIDN</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($dosen)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-5">
                                                <i class="bi bi-inbox" style="font-size: 3rem; color: #9ca3af;"></i>
                                                <p class="text-muted mt-2">Belum ada data dosen</p>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php 
                                        $currentPage = $pager->getCurrentPage();
                                        $perPage = $pager->getPerPage();
                                        $no = (($currentPage - 1) * $perPage) + 1;
                                        
                                        foreach($dosen as $d): 
                                        ?>
                                        <tr>
                                            <td><span class="badge bg-light text-dark"><?= $no++ ?></span></td>
                                            <td><strong><?= $d['nidn'] ?></strong></td>
                                            <td><?= $d['nama'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/dosen/edit/'.$d['nidn']) ?>" 
                                                   class="btn btn-sm btn-warning me-1">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </a>
                                                <a href="<?= base_url('admin/dosen/delete/'.$d['nidn']) ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Yakin ingin menghapus dosen <?= $d['nama'] ?>?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <?php if(isset($total) && $total > 10): ?>
                        <div class="pagination-wrapper mt-4">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <div class="pagination-info mb-2 mb-md-0">
                                    <span class="text-muted">
                                        Menampilkan 
                                        <strong class="text-primary"><?= (($pager->getCurrentPage() - 1) * $pager->getPerPage()) + 1 ?></strong> 
                                        sampai 
                                        <strong class="text-primary"><?= min($pager->getCurrentPage() * $pager->getPerPage(), $total) ?></strong> 
                                        dari 
                                        <strong class="text-primary"><?= $total ?></strong> data
                                    </span>
                                </div>
                                <nav aria-label="Pagination">
                                    <?= $pager->links() ?>
                                </nav>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>

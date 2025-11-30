<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-plus-circle"></i> Tambah Dosen</h2>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/dosen/store') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">NIDN</label>
                                <input type="text" name="nidn" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <small class="text-muted">Password akan digunakan untuk login</small>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('admin/dosen') ?>" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>

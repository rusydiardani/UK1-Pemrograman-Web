<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-plus-circle"></i> Tambah Ruangan</h2>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/ruangan/store') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" class="form-control" placeholder="Contoh: R.101, Lab Komputer 1" required>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('admin/ruangan') ?>" class="btn btn-secondary">
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

<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-pencil"></i> Edit Dosen</h2>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/dosen/update/'.$dosen['nidn']) ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">NIDN</label>
                                <input type="text" class="form-control" value="<?= $dosen['nidn'] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?= $dosen['nama'] ?>" required>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update
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

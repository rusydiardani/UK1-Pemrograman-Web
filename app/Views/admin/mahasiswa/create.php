<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-plus-circle"></i> Tambah Mahasiswa</h2>
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/mahasiswa/store') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">NIM <span class="text-danger">*</span></label>
                                <input type="text" name="nim" class="form-control <?= session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['nim']) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('nim') ?>" required>
                                <?php if(session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['nim'])): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nim'] ?>
                                    </div>
                                <?php endif; ?>
                                <small class="text-muted">NIM harus unik dan minimal 5 karakter</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control <?= session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['nama']) ? 'is-invalid' : '' ?>" 
                                       value="<?= old('nama') ?>" required>
                                <?php if(session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['nama'])): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['nama'] ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control <?= session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['password']) ? 'is-invalid' : '' ?>" required>
                                <?php if(session()->getFlashdata('errors') && isset(session()->getFlashdata('errors')['password'])): ?>
                                    <div class="invalid-feedback">
                                        <?= session()->getFlashdata('errors')['password'] ?>
                                    </div>
                                <?php endif; ?>
                                <small class="text-muted">Password minimal 6 karakter, akan digunakan untuk login</small>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('admin/mahasiswa') ?>" class="btn btn-secondary">
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

<div class="col-md-2 sidebar p-0">
    <div class="user-info text-center">
        <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
        <h6 class="mt-2 mb-0"><?= session()->get('nama_user') ?></h6>
        <small>Dosen</small>
        <small class="d-block"><?= session()->get('nidn') ?></small>
    </div>
    
    <nav class="nav flex-column">
        <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a class="nav-link <?= strpos(uri_string(), 'dosen/jadwal') !== false ? 'active' : '' ?>" href="<?= base_url('dosen/jadwal') ?>">
            <i class="bi bi-calendar3"></i> Jadwal Mengajar
        </a>
        <hr class="text-white">
        <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </nav>
</div>

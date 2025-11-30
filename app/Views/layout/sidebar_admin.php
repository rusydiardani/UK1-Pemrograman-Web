<div class="col-md-2 sidebar p-0">
    <div class="user-info text-center">
        <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
        <h6 class="mt-2 mb-0"><?= session()->get('nama_user') ?></h6>
        <small>Administrator</small>
    </div>
    
    <nav class="nav flex-column">
        <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a class="nav-link <?= strpos(uri_string(), 'admin/mahasiswa') !== false ? 'active' : '' ?>" href="<?= base_url('admin/mahasiswa') ?>">
            <i class="bi bi-people"></i> Data Mahasiswa
        </a>
        <a class="nav-link <?= strpos(uri_string(), 'admin/dosen') !== false ? 'active' : '' ?>" href="<?= base_url('admin/dosen') ?>">
            <i class="bi bi-person-badge"></i> Data Dosen
        </a>
        <a class="nav-link <?= strpos(uri_string(), 'admin/ruangan') !== false ? 'active' : '' ?>" href="<?= base_url('admin/ruangan') ?>">
            <i class="bi bi-door-open"></i> Data Ruangan
        </a>
        <a class="nav-link <?= strpos(uri_string(), 'admin/jadwal') !== false ? 'active' : '' ?>" href="<?= base_url('admin/jadwal') ?>">
            <i class="bi bi-calendar3"></i> Data Jadwal
        </a>
        <hr class="text-white">
        <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </nav>
</div>

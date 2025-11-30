<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Perkuliahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 0;
        }
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            margin: auto;
        }
        .login-left {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            padding: 60px 40px;
        }
        .login-right {
            padding: 60px 40px;
        }
        .btn-login {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 2px solid #e5e7eb;
        }
        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card row g-0">
            <div class="col-md-6 login-left d-flex flex-column justify-content-center">
                <h1 class="mb-4"><i class="bi bi-mortarboard-fill"></i> Sistem Perkuliahan</h1>
                <p class="lead">Kelola jadwal, rencana studi, dan penilaian dengan mudah</p>
                <div class="mt-4">
                    <p><i class="bi bi-check-circle-fill me-2"></i> Manajemen Mahasiswa & Dosen</p>
                    <p><i class="bi bi-check-circle-fill me-2"></i> Penjadwalan Kuliah</p>
                    <p><i class="bi bi-check-circle-fill me-2"></i> Rencana & Hasil Studi</p>
                </div>
            </div>
            <div class="col-md-6 login-right">
                <h3 class="mb-4">Selamat Datang</h3>
                <p class="text-muted mb-4">Silakan login untuk melanjutkan</p>
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <form action="<?= base_url('authenticate') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="NIM / NIDN" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-login btn-primary w-100 text-white">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Login
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

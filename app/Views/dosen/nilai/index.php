<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_dosen') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-pencil-square"></i> Input Nilai</h2>
                
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Mata Kuliah</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Kode:</strong> <?= $jadwal['kode_mata_kuliah'] ?></p>
                                <p><strong>Mata Kuliah:</strong> <?= $jadwal['nama_mata_kuliah'] ?></p>
                                <p><strong>SKS:</strong> <?= $jadwal['sks'] ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Kelas:</strong> <?= $jadwal['nama_kelas'] ?></p>
                                <p><strong>Ruangan:</strong> <?= $jadwal['nama_ruangan'] ?></p>
                                <p><strong>Jadwal:</strong> <?= $jadwal['hari'] ?>, <?= $jadwal['jam'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Daftar Mahasiswa</h5>
                        <form action="<?= base_url('dosen/nilai/update') ?>" method="post">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Nilai Angka</th>
                                            <th>Nilai Huruf</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($mahasiswa)): ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Belum ada mahasiswa yang mengambil mata kuliah ini</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php $no = 1; foreach($mahasiswa as $mhs): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $mhs['nim'] ?></td>
                                                <td><?= $mhs['nama'] ?></td>
                                                <td>
                                                    <input type="hidden" name="id_rencana_studi[]" value="<?= $mhs['id_rencana_studi'] ?>">
                                                    <input type="number" name="nilai_angka[]" class="form-control" 
                                                           value="<?= $mhs['nilai_angka'] ?>" 
                                                           min="0" max="100" step="0.01">
                                                </td>
                                                <td>
                                                    <select name="nilai_huruf[]" class="form-select">
                                                        <option value="">-</option>
                                                        <?php foreach($nilai_mutu as $nm): ?>
                                                            <option value="<?= $nm['nilai_huruf'] ?>" 
                                                                <?= $mhs['nilai_huruf'] == $nm['nilai_huruf'] ? 'selected' : '' ?>>
                                                                <?= $nm['nilai_huruf'] ?> (<?= $nm['nilai_mutu'] ?>)
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if(!empty($mahasiswa)): ?>
                                <div class="d-flex gap-2 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Simpan Nilai
                                    </button>
                                    <a href="<?= base_url('dosen/jadwal') ?>" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>

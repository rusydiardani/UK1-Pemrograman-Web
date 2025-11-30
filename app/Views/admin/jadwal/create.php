<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-plus-circle"></i> Tambah Jadwal</h2>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/jadwal/store') ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" placeholder="Contoh: A, B, C" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mata Kuliah</label>
                                    <select name="id_mata_kuliah" class="form-select" required>
                                        <option value="">Pilih Mata Kuliah</option>
                                        <?php foreach($mata_kuliah as $mk): ?>
                                            <option value="<?= $mk['id_mata_kuliah'] ?>">
                                                <?= $mk['kode_mata_kuliah'] ?> - <?= $mk['nama_mata_kuliah'] ?> (<?= $mk['sks'] ?> SKS)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Dosen</label>
                                    <select name="nidn" class="form-select" required>
                                        <option value="">Pilih Dosen</option>
                                        <?php foreach($dosen as $d): ?>
                                            <option value="<?= $d['nidn'] ?>"><?= $d['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Ruangan</label>
                                    <select name="id_ruangan" class="form-select" required>
                                        <option value="">Pilih Ruangan</option>
                                        <?php foreach($ruangan as $r): ?>
                                            <option value="<?= $r['id_ruangan'] ?>"><?= $r['nama_ruangan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hari</label>
                                    <select name="hari" class="form-select" required>
                                        <option value="">Pilih Hari</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jam</label>
                                    <input type="text" name="jam" class="form-control" placeholder="Contoh: 08:00-10:00" required>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('admin/jadwal') ?>" class="btn btn-secondary">
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

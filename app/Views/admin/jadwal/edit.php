<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_admin') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-pencil"></i> Edit Jadwal</h2>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('admin/jadwal/update/'.$jadwal['id']) ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" value="<?= $jadwal['nama_kelas'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mata Kuliah</label>
                                    <select name="id_mata_kuliah" class="form-select" required>
                                        <?php foreach($mata_kuliah as $mk): ?>
                                            <option value="<?= $mk['id_mata_kuliah'] ?>" <?= $jadwal['id_mata_kuliah'] == $mk['id_mata_kuliah'] ? 'selected' : '' ?>>
                                                <?= $mk['kode_mata_kuliah'] ?> - <?= $mk['nama_mata_kuliah'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Dosen</label>
                                    <select name="nidn" class="form-select" required>
                                        <?php foreach($dosen as $d): ?>
                                            <option value="<?= $d['nidn'] ?>" <?= $jadwal['nidn'] == $d['nidn'] ? 'selected' : '' ?>>
                                                <?= $d['nama'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Ruangan</label>
                                    <select name="id_ruangan" class="form-select" required>
                                        <?php foreach($ruangan as $r): ?>
                                            <option value="<?= $r['id_ruangan'] ?>" <?= $jadwal['id_ruangan'] == $r['id_ruangan'] ? 'selected' : '' ?>>
                                                <?= $r['nama_ruangan'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Hari</label>
                                    <select name="hari" class="form-select" required>
                                        <option value="Senin" <?= $jadwal['hari'] == 'Senin' ? 'selected' : '' ?>>Senin</option>
                                        <option value="Selasa" <?= $jadwal['hari'] == 'Selasa' ? 'selected' : '' ?>>Selasa</option>
                                        <option value="Rabu" <?= $jadwal['hari'] == 'Rabu' ? 'selected' : '' ?>>Rabu</option>
                                        <option value="Kamis" <?= $jadwal['hari'] == 'Kamis' ? 'selected' : '' ?>>Kamis</option>
                                        <option value="Jumat" <?= $jadwal['hari'] == 'Jumat' ? 'selected' : '' ?>>Jumat</option>
                                        <option value="Sabtu" <?= $jadwal['hari'] == 'Sabtu' ? 'selected' : '' ?>>Sabtu</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jam</label>
                                    <input type="text" name="jam" class="form-control" value="<?= $jadwal['jam'] ?>" required>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Update
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

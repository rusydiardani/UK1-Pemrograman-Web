<?= $this->include('layout/header') ?>

<div class="container-fluid">
    <div class="row">
        <?= $this->include('layout/sidebar_mahasiswa') ?>
        
        <div class="col-md-10">
            <div class="main-content">
                <h2 class="mb-4"><i class="bi bi-plus-circle"></i> Tambah Mata Kuliah</h2>
                
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('mahasiswa/rencana-studi/store') ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Pilih Jadwal Mata Kuliah</label>
                                <select name="id_jadwal" class="form-select" required>
                                    <option value="">-- Pilih Jadwal --</option>
                                    <?php foreach($jadwal as $j): ?>
                                        <option value="<?= $j['id'] ?>">
                                            <?= $j['kode_mata_kuliah'] ?> - <?= $j['nama_mata_kuliah'] ?> 
                                            (Kelas <?= $j['nama_kelas'] ?>) - <?= $j['hari'] ?>, <?= $j['jam'] ?> 
                                            - Dosen: <?= $j['nama_dosen'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('mahasiswa/rencana-studi') ?>" class="btn btn-secondary">
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

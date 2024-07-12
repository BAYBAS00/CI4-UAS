<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4" style="max-width: 800px;">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Kehadiran</h2>
                </div>
                <div class="card-body">
                    <?php if (!empty(session()->getFlashdata('message'))) : ?>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>
                                <ul class="mb-0">
                                    <?php foreach (session()->getFlashdata('message') as $data) : ?>
                                        <li>
                                            <?= $data ?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>

                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php endif ?>

                    <form action="<?= url_to('Kehadiran::update', $kehadiran['id_hadir']) ?>" method="post">
                        <div class="form-group row mb-2">
                            <label for="tgl_hadir">Tanggal Hadir</label>
                            <input type="date" name="tgl_hadir" class="form-control" id="tgl_hadir" placeholder="dd/m/yy" value="<?= $kehadiran['tgl_hadir'] ?>">
                        </div>
                        <div class="form-group row mb-2">
                            <label for="id_matkul" class="col-sm-2 col-form-label">Mata Kuliah</label>
                            <select name="id_matkul" id="id_matkul" class="form-control">
                                <option value="">Mata Kuliah</option>
                                <?php foreach ($matkul as $row) : ?>
                                    <option value="<?= $row['id_matkul'] ?>"><?= $kehadiran['id_matkul'] == $row['id_matkul'] ? 'selected' : '' ?>><?= $row['nama_matkul'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="absensi" class="col-sm-2 col-form-label">Absensi</label>
                            <select name="absensi" id="absensi" class="form-control">
                                <option value="">Absensi</option>
                                <option value="0" <?= $kehadiran['absensi'] == 0 ? 'selected' : '' ?>>Tidak Hadir</option>
                                <option value="1" <?= $kehadiran['absensi'] == 1 ? 'selected' : '' ?>>Hadir</option>
                            </select>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="catatan">Catatan</label>
                            <input type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan" value="<?= $kehadiran['catatan'] ?>">
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= url_to('Kehadiran::index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
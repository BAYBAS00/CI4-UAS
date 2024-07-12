<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4" style="max-width: 800px;">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Ubah Data Mata Kuliah</h2>
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

                    <form action="<?= url_to('Matkul::update', $matkul['id_matkul']) ?>" method="post">

                        <div class="form-group row mb-2">
                            <label for="nama_matkul" class="col-sm-2 col-form-label">Nama matkul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Nama matkul" value="<?= $matkul['nama_matkul'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="sks" class="col-sm-2 col-form-label">SKS</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="sks" name="sks" placeholder="SKS" value="<?= $matkul['sks'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="semester" name="semester" placeholder="Semester" value="<?= $matkul['semester'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="id_user" class="col-sm-2 col-form-label">Nama Dosen</label>
                            <div class="col-sm-10">
                                <select name="id_user" id="id_user" class="form-control">'>
                                    <option value="">Nama Dosen</option>
                                    <?php foreach ($user as $row) : ?>
                                        <option value="<?= $row['id_user'] ?>" <?= $matkul['id_user'] == $row['id_user'] ? 'selected' : '' ?>><?= $row['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= url_to('Matkul::index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
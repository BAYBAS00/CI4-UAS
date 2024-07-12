<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4" style="max-width: 800px;">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah User</h2>
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

                    <form action="<?= url_to('User::save') ?>" method="post">
                        <div class="form-group row mb-2">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="name" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama User">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="no_telp" class="col-sm-2 col-form-label">No telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Status</option>
                                    <option value="0">Tidak Aktif</option>
                                    <option value="1">Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="posisi" name="hak_akses">
                                    <option value="">Pilih</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Dosen</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= url_to('User::index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
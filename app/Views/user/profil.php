<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-4" style="max-width: 800px;">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2>Edit User</h2>
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

                    <form action="<?= url_to('User::update', $user['id_user']) ?>" method="post">
                        <div class="form-group row mb-2">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Name" value="<?= $user['username'] ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= url_to('Home::index') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
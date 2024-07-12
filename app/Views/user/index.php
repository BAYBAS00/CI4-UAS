<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Data User</h2>
    </div>
</div>
<div class="container mt-3">

    <div class="row">
        <div class="col">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        <?php echo session()->getFlashdata('message'); ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php endif ?>

            <a href="<?= url_to('User::tambah') ?>" class="btn btn-md btn-primary mb-3 fa fa-plus"> TAMBAH DATA</a>
            <table class="table table-bordered table-striped table-light">
                <thead class="thead-dark text-center">
                    <tr>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($data as $user) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $user['kode'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['no_telp'] ?></td>
                            <td><?php echo $user['alamat'] ?></td>
                            <td><?php echo $user['status'] ?></td>
                            <td><?php echo $user['hak_akses'] ?></td>
                            <td class="text-center">
                                <a href="<?= url_to('User::edit', $user['id_user']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                <a href="<?= url_to('User::hapus', $user['id_user']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
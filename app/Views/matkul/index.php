<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Data Mata Kuliah</h2>
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

            <?php
            if (session()->get('hak_akses') == 1) :
            ?>
                <a href="<?= url_to('Matkul::tambah') ?>" class="btn btn-md btn-primary mb-3 fa fa-plus"> TAMBAH DATA</a>
            <?php endif; ?>
            <table class="table table-bordered table-striped table-light">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Nama Dosen</th>
                        <?php
                        if (session()->get('hak_akses') == 1) :
                        ?>
                            <th>AKSI</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($data as  $matkul) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo  $matkul['nama_matkul'] ?></td>
                            <td><?php echo $matkul['sks'] ?></td>
                            <td><?php echo  $matkul['semester'] ?></td>
                            <td><?php echo  $matkul['name'] ?></td>
                            <td class="text-center">
                                <?php
                                if (session()->get('hak_akses') == 1) :
                                ?>
                                <a href="<?= url_to('Matkul::edit',  $matkul['id_matkul']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                <a href="<?= url_to('Matkul::hapus',  $matkul['id_matkul']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
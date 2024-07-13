<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h2 class="text-center">Data Kehadiran</h2>
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

            <?php if (session()->get('hak_akses') == 2) : ?>
                <a href="<?= url_to('Kehadiran::tambah') ?>" class="btn btn-md btn-primary mb-3 fa fa-plus"> TAMBAH DATA</a>
            <?php endif; ?>
            <table class="table table-bordered table-striped table-light">
                <thead class="thead-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Hadir</th>
                        <th>Mata Kuliah</th>
                        <th>Absensi</th>
                        <th>Catatan</th>
                        <?php if (session()->get('hak_akses') == 2) : ?>
                            <th>AKSI</th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php
                    $no = 1;
                    foreach ($data as  $hadir) : ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo  $hadir['tgl_hadir'] ?></td>
                            <td><?php echo $hadir['nama_matkul'] ?></td>
                            <td><?php echo  $hadir['absensi'] ?></td>
                            <td><?php echo  $hadir['catatan'] ?></td>

                            <?php
                            if (session()->get('hak_akses') == 2) :
                            ?>
                                <td class="text-center">
                                    <a href="<?= url_to('Kehadiran::edit',  $hadir['id_hadir']); ?>" class="btn btn-warning fa fa-pencil-square-o"> Edit</a>
                                    <a href="<?= url_to('Kehadiran::hapus',  $hadir['id_hadir']); ?>" class=" btn btn-danger fa fa-trash-o"> Hapus</a>
                                    <a href="<?= url_to('Kehadiran::hadir',  $hadir['id_hadir']); ?>" class=" btn btn-info">Kirim</a>
                                </td>
                            <?php endif; ?>

                        </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?= $pager->links('kehadiran', 'pagers') ?>
    </div>
</div>
<?= $this->endSection() ?>
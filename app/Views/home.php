<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<main class="container">

    <div class="starter-template text-center py-5 px-3">
        <h1>Hai <?= session()->get('username'); ?> !</h1>
        <p class="lead">Selamat Datang di Dashboard Akademik
        </p>
    </div>

</main><!-- /.container -->
<?= $this->endSection() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-1">
        <div class="container">
            <a class="navbar-brand" href="/">AKADEMIK | UAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php
                    if (session()->get('hak_akses') == 1) :
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= url_to('User::index') ?>">Users</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dosen
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= url_to('Matkul::index') ?>">Mata Kuliah</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= url_to('Kehadiran::index') ?>">Kehadiran</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= session()->get('username'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            if (session()->get('hak_akses') == 2) :
                            ?>
                                <li><a class="dropdown-item" href="<?= url_to('Profil::edit') ?>">User</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?= url_to('Login::index') ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
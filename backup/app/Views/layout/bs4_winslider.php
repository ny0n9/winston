<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Winston Sahusilawane">
    <meta name="generator" content="Codeigniter 4 and Bootstrap 4">
    <?= $this->renderSection('metaTags') ?>
    <link rel="icon" href="<?= base_url('public/favicon.ico'); ?>">
    <link rel="icon" type="image/x-icon" href="<?= base_url('public/favicon.ico'); ?>">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?= base_url('public/favicon.ico'); ?>">
    <title><?= empty($title) ? uri_title() : $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('public/css/bs462-winstyles.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>
    <?php helper('auth'); ?>
    <?= $this->renderSection('pageMenu') ?>

    <main role="main">
        <?= $this->renderSection('pageContent') ?>
    </main>

    <footer class="container-fluid my-3">
        <div class="row text-center">
            <div class="col-sm">Page rendered in {elapsed_time} seconds</div>
            <div class="col-sm">@2021 by <a href="https://winston.lan/" target="_blank">Winston Sahusilawane</a></div>
            <div class="col-sm">Environment: <?= ENVIRONMENT ?></div>
            <div class="w-100"></div>
        </div>
        <div class="row text-center">
            <div class="col-12"><b>CodeIgniter Version : <?= CodeIgniter\CodeIgniter::CI_VERSION ?></b></div>
        </div>
        <?= 'HTTP_HOST = ' . $_SERVER['HTTP_HOST'] ?>
        <?= ' --- REQUEST_URI = ' . $_SERVER['REQUEST_URI'] ?>
        <?= ' --- base_url = ' . base_url() ?>
        <?= ' --- site_url = ' . site_url() ?>
        </div>
    </footer>

    <script src="<?= base_url('public/winslider/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('public/js/bs462-wins.min.js'); ?>"></script>
    <?= $this->renderSection('pageScripts') ?>
</body>

</html>
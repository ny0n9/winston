<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="Hugo 0.115.4">
	<?= $this->renderSection('metaTags') ?>
	<title><?= empty($title) ? uri_title() : $title; ?></title>
	<link href="<?= base_url('public/css/bs531-styles.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('public/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<?= $this->renderSection('pageStyles') ?>
	<link href="<?= base_url('public/style.css'); ?>" rel="stylesheet">
</head>

<body>
	<?php helper('auth'); ?>
	<?= $this->renderSection('pageMenu') ?>

	<main role="main">
		<?= $this->renderSection('pageContent') ?>
	</main>

	<footer class="container-fluid my-3 bg-greenwin">
		<div class="row text-center">
			<div class="col-sm">Page rendered in {elapsed_time} seconds</div>
			<div class="col-sm">@2021 by <a href="https://winston.lan/" target="_blank">Winston Sahusilawane</a></div>
			<div class="col-sm">Environment: <?= ENVIRONMENT ?></div>
			<div class="w-100"></div>
		</div>
		<div class="row text-center">
			<div class="col-12"><b>CodeIgniter Version : <?= CodeIgniter\CodeIgniter::CI_VERSION ?></b></div>
		</div>
		<div class="row text-center">
			<div class="col-sm"><?= 'HTTP_HOST = ' . $_SERVER['HTTP_HOST'] ?></div>
			<div class="col-sm"><?= ' --- REQUEST_URI = ' . $_SERVER['REQUEST_URI'] ?></div>
			<div class="col-sm"><?= ' --- base_url = ' . base_url() ?></div>
			<div class="col-sm"><?= ' --- site_url = ' . site_url() ?></div>
		</div>
	</footer>

	<script src="<?= base_url('public/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('public/js/bs531-scripts.min.js'); ?>"></script>
	<?= $this->renderSection('pageScripts') ?>
</body>

</html>
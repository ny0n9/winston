<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Halaman Otentikasi">
	<meta name="author" content="Winston Sahusilawane">
	<meta name="generator" content="Hugo 0.115.4">
	<meta name="robots" content="noindex">
	<title><?= empty($title) ? uri_title() : $title; ?></title>
	<link rel="icon" href="<?= base_url('public/favicon.ico'); ?>">
	<link rel="icon" type="image/x-icon" href="<?= base_url('public/favicon.ico'); ?>">
	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?= base_url('public/favicon.ico'); ?>">
	<link href="<?= base_url('public/css/bs533-styles.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('public/style.css'); ?>" rel="stylesheet">
	<?= $this->renderSection('pageStyles') ?>
</head>

<body>
	<?php helper('auth'); ?>
	<?= $this->include('layout/bs5-main-menu') ?>

	<main role="main">
		<?= $this->renderSection('main') ?>
	</main>

	<footer class="container-fluid mt-3 text-bg-primary">
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
			<div class="col-sm"><?= "_SERVER['HTTP_HOST'] = " . $_SERVER['HTTP_HOST'] ?></div>
			<div class="col-sm"><?= "_SERVER['REQUEST_URI'] = " . $_SERVER['REQUEST_URI'] ?></div>
		</div>
		<div class="row text-center">
			<div class="col-sm"><?= 'base_url = ' . base_url() ?></div>
			<div class="col-sm"><?= 'site_url = ' . site_url() ?></div>
		</div>
	</footer>

	<script src="<?= base_url('public/js/bs533-scripts.min.js'); ?>"></script>
	<?= $this->renderSection('pageScripts') ?>
</body>

</html>
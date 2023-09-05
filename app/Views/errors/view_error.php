<?= $this->extend('layout/bs5-minimal'); ?>

<?= $this->section('metaTags'); ?>
<meta name="robots" content="noindex">
<?= $this->endSection(); ?>

<?= $this->section('pageStyle'); ?>
<!-- Tambahan stylesheet disini -->
<?= $this->endSection(); ?>

<?= $this->section('pageMenu'); ?>
<?= $this->include('layout/bs5-main-menu') ?>
<?= $this->endSection(); ?><!-- Section pageMenu -->

<?= $this->section('pageContent'); ?>
<section class="container-fluid">
	<article class="row">
		<div class="col-12 text-center">
			<h1><?= $title; ?></h1><br>
			<h2><?= $message; ?></h2>
		</div>
	</article>
</section>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<!-- Isi javascript tambahan disini -->
<?= $this->endSection(); ?>
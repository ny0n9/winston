<?= $this->extend('layout/bs4_minimal'); ?>

<?= $this->section('metaTags'); ?>
<!-- Isi metaTags tambahan disini -->
<meta name="robots" content="noindex">
<meta name="description" content="Diskripsi singkat dari halaman yang akan ditampilkan">
<meta name="keywords" content="diskripsi, singkat, dari, halaman, yang, akan, ditampilkan">
<?= $this->endSection(); ?><!-- Section metaTags -->

<?= $this->section('pageStyles'); ?>
<!-- Isi CSS tambahan disini -->
<style>
	pre {
		margin-top: 0;
		margin-bottom: 16px;
	}

	code {
		overflow-x: auto;
		overflow-y: hidden;
	}
</style>
<?= $this->endSection(); ?><!-- Section pageStyles -->

<?= $this->section('pageMenu'); ?>
<?= $this->include('layout/main_menu') ?>
<?= $this->endSection(); ?><!-- Section pageMenu -->

<?= $this->section('pageContent'); ?>
<section class="container-fluid">
	<article class="row">
		<div class="col-12">
			<h1 class="text-center"><?= $title; ?></h1>
		</div>
	</article>
</section>
<!-- Isi halaman utama disini -->
<?= $this->endSection(); ?><!-- Section main -->

<?= $this->section('pageScripts'); ?>
<!-- Isi javascript tambahan disini -->
<?= $this->endSection(); ?><!-- Section pageScripts -->
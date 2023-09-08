<?= $this->extend('layout/bs5-minimal'); ?>

<?= $this->section('metaTags'); ?>
<!-- Isi metaTags tambahan disini -->
<meta name="description" content="Catatan singkat Codeigniter 4, Datatables Server Side sert Website tips dan trik">
<meta name="keywords" content="catatan, singkat, codeigniter, datatables, server side, website, tips dan trik">
<?= $this->endSection(); ?><!-- Section metaTags -->

<?= $this->section('pageStyles'); ?>
<!-- Isi CSS tambahan disini -->
<?= $this->endSection(); ?><!-- Section pageStyles -->

<?= $this->section('pageMenu'); ?>
<?= $this->include('layout/bs5-main-menu') ?>
<?= $this->endSection(); ?><!-- Section pageMenu -->

<?= $this->section('pageContent'); ?>
<section class="container-fluid">
	<article class="row">
		<div class="col-12 jumbotron">
			<h1 class="text-center">Selamat Datang</h1>
			<img src="<?= site_url('public/img/wins-garuda-250x250.jpg') ?>" class="rounded mx-auto d-block" alt="Winston">
			<h2 class="text-center">Situs ini dibangun dengan memanfaatkan</h2>
			<h3 class="text-center">Framework PHP : CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h3>
			<h3 class="text-center">Framework CSS : Bootstrap 5.3.1</h3>
			<p class="text-center">Situs ini akan menampilkan catatan singkat terkait Codeigniter 4, Datatables Server Side juga tips dan trik tentang website</p>
			<p class="text-center">Isi folder dari situs ini dapat dilihat di : https://github.com/ny0n9/winston atau dapat di download dengan perintah :</p>
			<p>
			<pre class="text-center"><code>git clone https://github.com/ny0n9/winston.git</code></pre>
			</p>
		</div>
	</article>
</section>
<!-- Isi halaman utama disini -->
<?= $this->endSection(); ?><!-- Section main -->

<?= $this->section('pageScripts'); ?>
<!-- Isi javascript tambahan disini -->
<?= $this->endSection(); ?><!-- Section pageScripts -->
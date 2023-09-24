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
<!-- Isi halaman utama disini -->
<section class="container-fluid">
	<article class="row">
		<div class="col-12 jumbotron">
			<h1 class="text-center">Selamat Datang</h1>
			<img src="<?= site_url('public/img/wins-garuda-250x250.jpg') ?>" class="rounded mx-auto d-block" alt="Winston">
			<h2 class="text-center">Situs ini dibangun dengan memanfaatkan</h2>
			<h3 class="text-center">Framework PHP : CodeIgniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h3>
			<h3 class="text-center">Framework CSS : Bootstrap 5.3.2</h3>
			<p class="text-center">Situs ini akan menampilkan catatan singkat terkait Codeigniter 4, Datatables Server Side juga tips dan trik tentang website</p>
			<p class="text-center">Isi folder dari situs ini dapat dilihat di : https://github.com/ny0n9/winston atau dapat di download dengan perintah :</p>
			<p>
			<pre class="text-center"><code>git clone https://github.com/ny0n9/winston.git</code></pre>
			</p>
		</div>
	</article>
</section>
<section class="container-fluid">
	<article class="row">
		<div class="col-12">
			Winston Repository
			Ini adalah Codeigniter 4.4.1 yang sudah ditambahkan dengan Myth Auth 1.2.1 serta Bootstrap 5.3.1

			File framework CSS tersimpan pada folder public

			Akses ke ROOT tidak lagi di folder public tetapi langsung ke folder instalasi sehingga memudahkan untuk di upload ke webhosting.

			File untuk mempermudah membangun view aplikasi terdapat pada folder Views/layout dimana didalamnya terdapat 4 file :<br>
			bs5-minimal.php -> untuk membangun view standard<br>
			bs5-jsminimal.php -> untuk membangun view standard menggunakan jquery<br>
			bs5-mythauth.php -> untuk layout login, register dan forgot dari Myth Auth<br>
			bs5-winslider -> untuk view yang menyertakan winslider

			Setelah download repository ini, perlu dijalankan pada folder dimana file README.md ada :<br>
			&emsp; composer require codeigniter4/framework <br>
			agar folder vendor nya didownload oleh composer, kemudian copy file Email.php yang tidak disertakan pada repository ini dengan perintah : <br>
			&emsp; cp -av vendor/codeigniter4/framework/app/Config/Email.php app/Config/

			Cara menggunakan SQLite3 di Codeigniter 4

			1. pastikan pada file php.ini, kedua extension dibawah ini diaktivkan :<br>
			&emsp; extension=pdo_sqlite <br>
			&emsp; extension=sqlite3 <br>
			jika konfigurasi diatas baru di buat, maka harus di restart server aoache nya

			2. pada file .env konfigurasi database sebagai berikut :<br>
			&emsp; database.default.database = ci4sqlite.db <br>
			&emsp; database.default.DBDriver = SQLite3

			3. pada folder instalasi jalankan perintah :<br>
			&emsp; php spark db:create ci4sqlite<br>
			maka secara otomatis pada folder writable akan dibuatkan file :<br>
			&emsp; ci4sqlite.db // writable/ci4sqlite.db

			4. untuk mengujinya jalankan perintah :<br>
			&emsp; php spark migrate --all

			Codeigniter 4 and Datatables Server Side:<br>
			Untuk model datatables server side menggunakan file model app/Models/SspModel.php<br>
			namun SspModel ini dapat juga digunakan secara global untuk semua table<br>

			Cara pakai di Controller :<br>
			&emsp; $paramas['table'] = 'table_name';<br>
			&emsp; $params['primaryKey'] = 'primary_key';<br>
			&emsp; $params['allowedFields'] = ['field_01', 'field_02', 'dst'];<br>
			&emsp; $ssp = new SspModel($params);

			Demo Datatables Server Side menggunakan database sqlite3 dapat dilihat pada menu Pengaturan->Pengguna->Kelola Pengguna<br>
			Demo users :<br>
			&emsp; master@winston.lan master P455w0rd5<br>
			&emsp; admin@winston.lan admin P455w0rd5<br>
			&emsp; umum@winston.lan umum P455w0rd5<br>

			Datatables Server Side pada repository ini juga sudah menerapak fixed header pada bootstrap navbar sticky-top
			untuk menampilkannya tambahkan 25 data pada users table dengan menjalan perintah dibawah ini pada folder instalasi :<br>
			&emsp; php spark db:seed SeedUsers
		</div>
	</article>
</section>

<?= $this->endSection(); ?><!-- Section main -->

<?= $this->section('pageScripts'); ?>
<!-- Isi javascript tambahan disini -->
<?= $this->endSection(); ?><!-- Section pageScripts -->
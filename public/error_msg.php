<?php 
define("BASE_URL", 'https://winston.lan/');
if(!function_exists('base_url')) {
	function base_url($str = '') {
		if (!empty($str)) return BASE_URL . $str;
		else return BASE_URL;
	}
}
$codes = [
	400 => ['400 Bad Request', 'Server menolak permintaan Anda yang buruk.'],
	401 => ['401 UnAuthorised', 'Server menolak permintaan Anda yang tidak sah.'],
	403 => ['403 Forbidden', 'Server menolak untuk memenuhi permintaan Anda / Hak Akses Anda tidak sesuai.'],
	404 => ['404 Not Found', 'Dokumen / file yang diminta tidak ditemukan di server ini.'],
	405 => ['405 Method Not Allowed', 'Metode yang ditentukan dalam Baris Permintaan tidak diperbolehkan untuk sumber daya yang ditentukan.'],
	406 => ['406 Not Acceptable', 'Ditolak karena tidak ada data yang cocok untuk kriteria yang diminta oleh user-agent'],
	408 => ['408 Request Timeout', 'Browser Anda gagal mengirim permintaan dalam waktu yang diizinkan oleh server.'],
	500 => ['500 Internal Server Error', 'Permintaan tidak berhasil karena kondisi tidak terduga yang ditemui oleh server.'],
	501 => ['501 Not Implemented','Permintaan tidak dapat ditangani karena tidak didukung oleh server.'],
	502 => ['502 Bad Gateway', 'Server menerima respons yang tidak valid dari server upstream saat mencoba memenuhi permintaan.'],
	503 => ['503 Service Unavailable','Saat ini belum siap menangani permintaan tersebut, coba tunggu beberapa saat lagi'],
	504 => ['504 Gateway Timeout', 'Server upstream gagal mengirim permintaan dalam waktu yang diizinkan oleh server.'],
	505 => ['505 HTTP Version Not Supported','Versi HTTP yang digunakan dalam permintaan tidak didukung oleh server.'],
	506 => ['506 Variant Also Negotiates','Sumber daya varian yang dipilih tidak tepat dalam proses negosiasi'],
	507 => ['507 Insufficient Storage','Metode ini tidak dapat di proses karena penyimpanan tidak cukup']
];

if (isset($exception)) {
	$status = $statusCode;
	$error_msg = $exception->getMessage();
	$trace = $exception->getTrace();
	$error_line = 'In file : '. $trace[2]['file'] . ' at line : ' . $trace[2]['line'];
	$error_file = $exception->getFile();
} else if (isset($_SERVER['REDIRECT_STATUS'])) {
	$status = $_SERVER['REDIRECT_STATUS'];
} else {
	$status = http_response_code();
}

if (isset($codes[$status][0])) {
	$title = $codes[$status][0];
	$message = $codes[$status][1];
} else if ($status == 200) {
	$title = 'HTML akses kode = 200';
	$message = 'Anda mengakses halaman ini secara langsung';
} else {
	$title = 'Error kode : ' . $status;
	$message = 'Error kode ' . $status . ' tidak valid';
}
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="generator" content="Hugo 0.115.4">
	<meta name="robots" content="noindex">
	<title><?= $title ?></title>
	<link rel="icon" href="<?= base_url('public/favicon.ico'); ?>">
	<link rel="icon" type="image/x-icon" href="<?= base_url('public/favicon.ico'); ?>">
	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?= base_url('public/favicon.ico'); ?>">
	<link href="<?= base_url('public/css/bs532-styles.min.css'); ?>" rel="stylesheet">
	<link href="<?= base_url('public/style.css'); ?>" rel="stylesheet">
</head>
<body>
<header class="container-fluid bg-redwin">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="pt-2 text-white">Winston Sahusilawane</h1>
		</div>
	</div>
</header>

<i onclick="topFunction()" id="topBtn" class="fa fa-arrow-circle-up fa-lg"></i>

<nav class="navbar navbar-expand-lg navbar-greenwin sticky-top bg-greenwin">
	<div class="container-fluid">
		<a class="navbar-brand text-white" href="<?= base_url() ?>"><i class="fa fa-home fa-lg"></i></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="text-white"><i class="fa fa-bars fa-lg"></i></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Icons</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
	<main role="main">
		<section class="container-fluid">
			<article class="row">
				<div class="col-12">
					<h2 class="text-center"><?= $title ?></h2>
					<p class="text-center"><?= $message ?></p>
					<p class="text-center"><?= (!empty($error_msg)) ? $error_msg : '' ?></p>
					<p class="text-center"><?= (!empty($error_line)) ? $error_line : '' ?></p>
					<p class="text-center"><?= (!empty($error_file)) ? 'From : ' . $error_file : '' ?></p>
				</div>
			</article>
		</section>
	</main>

	<footer class="container-fluid mt-3 bg-greenwin">
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

	<script src="<?= base_url('public/js/bs532-scripts.min.js'); ?>"></script>
</body>

</html>

<?php
helper('auth');
$slug = substr($_SERVER['REQUEST_URI'], 1);
?>
<header class="container-fluid bg-redwin">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="pt-2 text-white">Winston Sahusilawane</h1>
		</div>
	</div>
</header>

<i onclick="topFunction()" id="topBtn" class="fa fa-arrow-circle-up fa-lg"></i>

<nav class="navbar navbar-expand-lg sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand text-white <?= setActive($slug, '') ?>" href="/"><i class="fa fa-home fa-lg"></i></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="text-white"><i class="fa fa-bars fa-lg"></i></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link <?= setActive($slug, 'beranda/about') ?>" href="<?= site_url('beranda/about') ?>">Icons</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Master Table
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Akademik
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown-submenu">
							<a class="dropdown-item" href="#">
								Dropdown <span class="float-end custom-toggle-arrow"><i class="fa fa-caret-right"></i></span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Informasi
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="https://getbootstrap.com/">Bootstrap</a></li>
						<li><a class="dropdown-item" href="https://codeigniter.com/">Codeigniter</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown-submenu">
							<a class="dropdown-item" href="#">
								Dropdown <span class="float-end custom-toggle-arrow"><i class="fa fa-caret-right"></i></span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Pengaturan
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown-submenu">
							<a class="dropdown-item" href="#">
								Pengguna <span class="float-end custom-toggle-arrow"><i class="fa fa-caret-right"></i></span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="<?= site_url('pengguna'); ?>">Kelola Pengguna</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Dashboard
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="<?= site_url('beranda/chartjs2') ?>">ChartJS v2.9.4</a></li>
						<li><a class="dropdown-item" href="<?= site_url('beranda/chartjs3') ?>">ChartJS v3.9.1</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown-submenu">
							<a class="dropdown-item" href="#">
								Dropdown <span class="float-end custom-toggle-arrow"><i class="fa fa-caret-right"></i></span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<?php if (logged_in()) : ?>
						<a href="<?= site_url('logout'); ?>" class="text-decoration-none">
							<span class="nav-link text-white"><i class="fa fa-sign-out"></i> Logout</span>
						</a>
					<?php else : ?>
						<a href="<?= site_url('login'); ?>" class="text-decoration-none">
							<span class="nav-link text-white"><i class="fa fa-sign-in"></i> Login</span></a>
					<?php endif; ?>
				</li>
			</ul>
		</div>
	</div>
</nav>
<?php if (logged_in()) : ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 bg-info text-white text-end">Anda Masuk Sebagai : <?= user()->username; ?></div>
		</div>
	</div>
	<?= var_dump($_SESSION); ?>
<?php endif; ?>
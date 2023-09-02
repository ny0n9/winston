<?php helper('auth');
$slug = substr($_SERVER['REQUEST_URI'], 1); ?>
<header class="container-fluid bg-redwin">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="pt-2 text-white"><?= empty($head_title) ? 'Winston Sahusilawane' : $head_title; ?></h1>
		</div>
	</div>
</header>
<i onclick="topFunction()" id="topBtn" class="fa fa-arrow-circle-up fa-lg"></i>
<nav class="navbar navbar-expand-md navbar-greenwin sticky-top bg-greenwin">
	<a class="navbar-brand" href="<?= site_url('/'); ?>"><i class="fa fa-university fa-lg"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="text-white bg-greenwin"><i class="fa fa-bars fa-1x"></i></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?= setActive($slug, 'beranda/about') ?>">
				<a class="nav-link" href="<?= site_url('beranda/about') ?>">Icons</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master Table</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="<?= site_url('beranda/test_permission') ?>">Test Permission</a></li>
					<li><a class="dropdown-item" href="#">Menu 1 Level 1</a></li>
					<li><a class="dropdown-item" href="#">Menu 2 Level 1</a></li>
					<li class="dropdown-submenu">
						<a class="dropdown-item dropdown-toggle" href="#">Sub Level 2</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Menu 1 Level 2</a></li>
							<li><a class="dropdown-item" href="#">Menu 2 Level 2</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akademik</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="#">Menu 1 Level 1</a></li>
					<li><a class="dropdown-item" href="#">Menu 2 Level 1</a></li>
					<li class="dropdown-submenu">
						<a class="dropdown-item dropdown-toggle" href="#">Sub Level 2</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Menu 1 Level 2</a></li>
							<li><a class="dropdown-item" href="#">Menu 2 Level 2</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informasi</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="#">Menu 1 Level 1</a></li>
					<li><a class="dropdown-item" href="#">Menu 2 Level 1</a></li>
					<li class="dropdown-submenu">
						<a class="dropdown-item dropdown-toggle" href="#">Sub Level 2</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Menu 1 Level 2</a></li>
							<li><a class="dropdown-item" href="#">Menu 2 Level 2</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengaturan</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="#">Menu 1 Level 1</a></li>
					<li><a class="dropdown-item" href="#">Menu 2 Level 1</a></li>
					<li class="dropdown-submenu">
						<a class="dropdown-item dropdown-toggle" href="#">Sub Level 2</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Menu 1 Level 2</a></li>
							<li><a class="dropdown-item" href="#">Menu 2 Level 2</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dashboard</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<li><a class="dropdown-item" href="<?= site_url('beranda/chartjs2') ?>">ChartJS v2.9.4</a></li>
					<li><a class="dropdown-item" href="<?= site_url('beranda/chartjs3') ?>">ChartJS v3.9.1</a></li>
					<li><a class="dropdown-item" href="#">Menu 1 Level 2</a></li>
				</ul>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<?php if (logged_in()) : ?>
					<a href="<?= site_url('logout'); ?>" class="text-decoration-none">
						<span class="nav-link text-white">
							<?= user()->username; ?>&nbsp;&nbsp;<i class="fa fa-sign-out"></i> Logout
						</span>
					</a>
				<?php else : ?>
					<a href="<?= site_url('login'); ?>" class="text-decoration-none">
						<span class="nav-link text-white"><i class="fa fa-sign-in"></i> Login</span></a>
				<?php endif; ?>
			</li>
		</ul>
	</div>
</nav>
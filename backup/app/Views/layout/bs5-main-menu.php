<?php
helper('auth');
$slug = substr($_SERVER['REQUEST_URI'], 1);
?>
<header class="container-fluid bg-redwin">
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="pt-2 text-white">Brand Header</h1>
		</div>
	</div>
</header>

<i onclick="topFunction()" id="topBtn" class="fa fa-arrow-circle-up fa-lg"></i>

<nav class="navbar navbar-expand-lg navbar-greenwin sticky-top bg-greenwin">
	<div class="container-fluid">
		<a class="navbar-brand text-white" href="/"><i class="fa fa-home fa-lg"></i></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="text-white"><i class="fa fa-bars fa-lg"></i></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('beranda/about') ?>">Icons</a>
				</li>
				<li class="nav-item dropdown">
					<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Master Table
					</button>
					<ul class="dropdown-menu dropdown-menu-greenwin">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Akademik
					</button>
					<ul class="dropdown-menu dropdown-menu-greenwin">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown">
							<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
							</button>
							<ul class="dropdown-menu dropdown-menu-greenwin">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Informasi
					</button>
					<ul class="dropdown-menu dropdown-menu-greenwin">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown">
							<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
							</button>
							<ul class="dropdown-menu dropdown-menu-greenwin">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Pengaturan
					</button>
					<ul class="dropdown-menu dropdown-menu-greenwin">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown">
							<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
							</button>
							<ul class="dropdown-menu dropdown-menu-greenwin">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Dashboard
					</button>
					<ul class="dropdown-menu dropdown-menu-greenwin">
						<li><a class="dropdown-item" href="<?= site_url('beranda/chartjs2') ?>">ChartJS v2.9.4</a></li>
						<li><a class="dropdown-item" href="<?= site_url('beranda/chartjs3') ?>">ChartJS v3.9.1</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
						<li class="nav-item dropdown">
							<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
							</button>
							<ul class="dropdown-menu dropdown-menu-greenwin">
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
	</div>
</nav>
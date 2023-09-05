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
		<a class="navbar-brand text-white" href="#"><i class="fa fa-home fa-lg"></i></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="text-white"><i class="fa fa-bars fa-lg"></i></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
			<ul class="navbar-nav me-auto">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>

				<li class="nav-item dropdown">
					<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						1 Level
					</button>
					<ul class="dropdown-menu dropdown-menu-greenwin">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>

				<li class="nav-item dropdown">
					<button class="btn btn-greenwin dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						2 Level
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
			</ul>
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-greenwin" type="submit">Search</button>
			</form>
		</div>
	</div>
</nav>
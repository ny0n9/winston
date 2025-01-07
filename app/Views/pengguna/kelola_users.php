<?= $this->extend('layout/bs5-jsminimal'); ?>

<?= $this->section('metaTags'); ?>
<!-- Isi metaTags tambahan disini -->
<meta name="robots" content="noindex">
<meta name="description" content="Kelola data pengguna">
<meta name="keywords" content="kelola, data, pengguna">
<?= $this->endSection(); ?><!-- Section metaTags -->

<?= $this->section('pageStyles'); ?>
<!-- Isi CSS tambahan disini -->
<link href="<?= base_url(); ?>/public/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/public/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/public/css/fixedHeader.bootstrap5.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/public/css/sweetalert2.min.css" rel="stylesheet">
<!-- Agar thead dan tbody inlined pada datatables server side maka table min-width = 100% -->
<style>
	table.dataTable {
		min-width: 100%;
	}
</style>
<?= $this->endSection(); ?><!-- Section pageStyles -->

<?= $this->section('pageMenu'); ?>
<?= $this->include('layout/bs5-main-menu') ?>
<?= $this->endSection(); ?><!-- Section pageMenu -->

<?= $this->section('pageContent'); ?>
<!-- Isi halaman utama disini -->
<section class="container-fluid">
	<article class="row">
		<div class="col-12">
			<h1 class="text-center"><?= $title; ?></h1>
		</div>
	</article>
</section>

<section class="container">
	<article class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Tambah Data Pengguna</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body viewdata">
					<button type="button" class="btn-primary btn-sm btn-add_user">
						<i class="fa fa-plus-circle"></i> Tambah Pengguna
					</button>
				</div>
			</div>
			<div class="table-responsive ml-1 mr-1">
				<table class="table table-striped table-bordered align-middle" id="data_users">
					<thead class="table-dark">
						<tr>
							<th id='0'>Aksi</th>
							<th id='1'>No</th>
							<th id='2'>ID</th>
							<th id='3'>Email</th>
							<th id='4'>Username</th>
							<th id='5'>Password Hash</th>
							<th id='6'>Aktif</th>
							<th id='7'>Created At</th>
							<th id='8'>Updated At</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

		</div>
	</article>
</section>

<div class="viewmodal" style="display: none;"></div>
<?= $this->endSection(); ?><!-- Section main -->

<?= $this->section('pageScripts'); ?>
<!-- Isi javascript tambahan disini -->
<script src="<?= base_url(); ?>/public/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/public/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url(); ?>/public/js/dataTables.fixedHeader.min.js"></script>
<!-- Untuk menggunakan fitur render : DataTable.render.datetime -->
<script src="<?= base_url(); ?>/public/js/moment.min.js"></script>
<script src="<?= base_url(); ?>/public/js/sweetalert2.all.min.js"></script>

<script>
const base_url = window.location.origin + '/';
let csrf = {};
csrf['<?= csrf_token(); ?>'] = "<?= csrf_hash(); ?>";
let csrfkey = "<?= csrf_token(); ?>";

<?= file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'kelola_users.js') ?>

</script>

<?= $this->endSection(); ?><!-- Section pageScripts -->
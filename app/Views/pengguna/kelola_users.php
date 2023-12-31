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
	function list_users() {
		dtable_users = $('#data_users').DataTable({
			serverSide: true,
			processing: true,
			ajax: {
				type: 'POST',
				url: "<?= site_url('pengguna/list_users'); ?>",
				headers: {
					'X-Requested-With': 'XMLHttpRequest'
				},
				dataType: "JSON",
				data: function(d) {
					d.<?= csrf_token(); ?> = "<?= csrf_hash(); ?>";
				}
			},
			fixedHeader: true,
			fixedHeader: {
				headerOffset: $('.sticky-top').outerHeight()
			},
			oLanguage: {
				sLengthMenu: "<b>Tampilkan _MENU_ data per halaman</b>",
				sSearch: "<b>Pencarian: </b>",
				sZeroRecords: "<b>Maaf, tidak ada data yang ditemukan</b>",
				sInfo: "<b>Records _START_ s/d _END_ dari _TOTAL_ </b>",
				sInfoEmpty: "<b>Records 0 s/d 0 dari 0 data</b>",
				sInfoFiltered: "<b>(di filter dari totl _MAX_ )</b>",
				oPaginate: {
					sFirst: "<i class='fa fa-angle-double-left fa-lg'></i>",
					sLast: "<i class='fa fa-angle-double-right fa-lg'></i>",
					sPrevious: "<i class='fa fa-angle-left fa-lg'></i>",
					sNext: "<i class='fa fa-angle-right fa-lg'></i>"
				}
			},
			columnDefs: [{
				targets: 0,
				orderable: false,
				class: "nowrap"
			}, {
				targets: 1,
				orderable: false,
				visible: true
			}, {
				targets: 2,
				visible: true
			}, {
				targets: 3,
				visible: true
			}, {
				targets: 4,
				visible: true
			}, {
				targets: 5,
				visible: false
			}, {
				targets: 6,
				visible: true
			}, {
				targets: 7,
				visible: true,
				render: DataTable.render.datetime('DD/MM/YYYY')
			}, {
				targets: 8,
				visible: true,
				render: DataTable.render.datetime('DD/MM/YYYY')
			}],
			paging: true,
			pagingType: 'full_numbers',
			order: [
				[2, 'asc']
			],
			scrollX: true
		});
	}

	function infoUser(key) {
		var fd = {};
		fd['id'] = key;
		fd['<?= csrf_token() ?>'] = '<?= csrf_hash(); ?>';
		$.ajax({
			url: "<?= site_url('pengguna/info_user') ?>",
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			type: "POST",
			dataType: "JSON",
			data: fd,
			success: function(response) {
				console.log(response.user);
				if (response.user) {
					$('.viewmodal').html(response.user).show();
					$('#info_user').modal('show');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
			}
		});
	}

	function delUser(key) {
		var fd = {};
		fd['id'] = key;
		fd['<?= csrf_token() ?>'] = '<?= csrf_hash(); ?>';
		$.ajax({
			url: "<?= site_url('pengguna/form_del_user') ?>",
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			type: "POST",
			dataType: "JSON",
			data: fd,
			success: function(response) {
				console.log(response.user);
				if (response.user) {
					$('.viewmodal').html(response.user).show();
					$('#del_user').modal('show');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
			}
		});
	}

	function editUser(key) {
		var fd = {};
		fd['id'] = key;
		fd['<?= csrf_token() ?>'] = '<?= csrf_hash(); ?>';
		$.ajax({
			url: "<?= site_url('pengguna/form_edit_user') ?>",
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			type: "POST",
			dataType: "JSON",
			data: fd,
			success: function(response) {
				console.log(response.user);
				if (response.user) {
					$('.viewmodal').html(response.user).show();
					$('#edit_user').modal('show');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
			}
		});
	}

	$(document).ready(function() {
		var dtable_users; // agar dapat reload datatables : dtable.ajax.reload(null, false);
		list_users();
		$('.btn-add_user').click(function(e) {
			e.preventDefault();
			var fd = {};
			fd['<?= csrf_token() ?>'] = '<?= csrf_hash(); ?>';
			$.ajax({
				type: "POST",
				url: "<?= site_url('pengguna/form_add_user') ?>",
				dataType: "JSON",
				data: fd,
				success: function(response) {
					$('.viewmodal').html(response.data_json).show();
					$('#modal_add_user').modal('show');
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});
		});

	});
</script>

<div class="viewmodal" style="display: none;"></div>
<?= $this->endSection(); ?><!-- Section pageScripts -->
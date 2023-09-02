<?= $this->extend('layout/bs4_minimal') ;?>

<?= $this->section('metaTags') ;?>
<!-- Isi metaTags tambahan disini -->
<meta name="robots" content="noindex">
<meta name="description" content="Diskripsi singkat dari halaman yang akan ditampilkan">
<meta name="keywords" content="diskripsi, singkat, dari, halaman, yang, akan, ditampilkan">
<?= $this->endSection() ;?><!-- Section metaTags -->

<?= $this->section('pageStyles') ;?>
<!-- Isi CSS tambahan disini -->
<link href="<?= base_url(); ?>/public/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<?= $this->endSection() ;?><!-- Section pageStyles -->

<?= $this->section('pageMenu') ;?>
    <?= $this->include('layout/main_menu') ?>
<?= $this->endSection() ;?><!-- Section pageMenu -->

<?= $this->section('pageContent') ;?>
<section class="container-fluid">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url() ?>/jemaat">Jemaat</a></li>
			<li class="breadcrumb-item active" aria-current="page">Per Sektor</li>
		</ol>
	</nav>

	<div class="row">
		<div class="page-title-box">
			<h1 class="page-title"><?= $title; ?></h1>
		</div>
	</div>

	<div class='row'>
		<form action="" method="POST" class="form-inline sektorForm">
			<div class="form-group mx-sm-3">
				<label class="form-check-label">
    				<input type="radio" class="form-check-input" id="kelamin" name="kelamin" value="ALL">Semua &nbsp;
				</label>
    		</div>
			<div class="form-group mx-sm-3">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" id="kelamin" name="kelamin" value="L">Laki laki &nbsp;
				</label>
			</div>
			<div class="form-group mx-sm-3">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" id="kelamin" name="kelamin" value="P">Perempuan &nbsp;
    			</label>
    		</div>
			<div class="form-group mx-sm-3">
				<label for="sektor">Sektor :
					<input type="number" class="form-control" id="sektor" name="sektor" min="1" max="3">
				</label>
			</div>
			<div class="form-group mx-sm-3">
				<button type="submit" class="btn btn-primary btn-sm btntampil">Show</button>
			</div>
		</form>
	</div>
</section>
<section class="container-fluid">
	<div class="table-responsive-xl">
	<table class="table table-striped table-bordered" id="data_jemaat_vie">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th id="0">No</th>
                    <th id="1">ID</th>
                    <th id="2">No Induk</th>
                    <th id="3">Foto</th>
                    <th id="4">Nama</th>
                    <th id="5">Alamat</th>
                    <th id="6">Tanggal Lahir</th>
                    <th id="7">Jenis Kelamin</th>
                    <th id="8">Hubungan Keluarga</th>
                    <th id="9">Status</th>
                    <th id="10">Sektor</th>
                    <th id="11">Pekerjaan</th>
                    <th id="12">Catatan</th>
                    <th id="13">Tugas Gereja</th>
                    <th id="14">No Telpon</th>
                    <th id="15">No HP</th>
                    <th id="16">Tanggal Baptis</th>
                    <th id="17">Tanggal Sidi</th>
                    <th id="18">Tanggal Nikah</th>
                    <th id="19">Keterangan</th>
                    <th id="20">Tanggal Buat</th>
                    <th id="21">Tanggal Hapus</th>
                    <th id="22">Tanggal Ubah</th>
                    <th id="23">Tgl UlTah</th>
                    <th id="24">Bln UlTah</th>
                    <th id="25">Usia</th>
                    <th id="26">Pelkat</th>
                    <th id="27">Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
	</div>
</section>
<?= $this->endSection() ;?><!-- Section pageContent -->

<?= $this->section('pageScripts') ;?>
<!-- Isi javascript tambahan disini -->
<script src="<?= base_url(); ?>/public/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/public/js/dataTables.bootstrap4.min.js"></script>
<!-- Untuk menggunakan fitur render : DataTable.render.datetime -->
<script src="<?= base_url(); ?>/public/js/moment.min.js"></script>

<script>
function loadSektorData(sek, kel) {
	$('#data_sektor').DataTable( {
		processing: true,
		serverSide: true,
		ajax: {
			type: 'POST',
			url: "<?= base_url(); ?>/jemaat/load_lihat_data",
			headers: {'X-Requested-With': 'XMLHttpRequest'},
			dataType: "JSON",
			data: function ( d ) {
				d.sektor = sek;
				d.kelamin = kel;
			}
		},
		oLanguage: {
			sLengthMenu: "Tampilkan _MENU_ data per halaman",
			sSearch: "Pencarian: ",
			sZeroRecords: "Maaf, tidak ada data yang ditemukan",
			sInfo: "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
			sInfoEmpty: "Menampilkan 0 s/d 0 dari 0 data",
			sInfoFiltered: "(di filter dari _MAX_ total data)",
			oPaginate: {
				sFirst: "<i class='fas fa-angle-double-left fa-lg'></i>",
				sLast: "<i class='fas fa-angle-double-right fa-lg'></i>",
				sPrevious: "<i class='fas fa-angle-left fa-lg'></i>",
				sNext: "<i class='fas fa-angle-right fa-lg'></i>"
			}
		},
		columnDefs: [
			{ targets:[0], orderable: false, visible: true },
			{ targets:[1], visible: true },
			{ targets:[2], visible: true },
			{ targets:[3], visible: true },
			{ targets:[4], visible: true },
			{ targets:[5], visible: false },
			{ targets:[6], visible: true, render: DataTable.render.datetime('DD/MM/YYYY') },
			{ targets:[7], visible: true },
			{ targets:[8], visible: false },
			{ targets:[9], visible: false },
			{ targets:[10], visible: true },
			{ targets:[11], visible: false },
			{ targets:[12], visible: false },
			{ targets:[13], visible: false },
			{ targets:[14], visible: false },
			{ targets:[15], visible: false },
			{ targets:[16], visible: false },
			{ targets:[17], visible: false },
			{ targets:[18], visible: false },
			{ targets:[19], visible: false },
			{ targets:[20], visible: false },
			{ targets:[21], visible: false },
			{ targets:[22], visible: false },
			{ targets:[23], visible: false },
			{ targets:[24], visible: false },
			{ targets:[25], visible: false },
			{ targets:[26], visible: true },
			{ targets:[27], class:"nowrap" }
		]
	});
}

function edit(id) {
	$.ajax({
		type: "POST",
		url: "<?= site_url('jemaat/form_edit') ?>",
		data: {
			id: id
		},
		dataType: "JSON",
		success: function (response) {
			if (response.sukses) {
				$('.viewmodal').html(response.sukses).show();
				$('#modal_edit').modal('show');
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
		}
	});
}

function hapus(id, nama) {
	var atitle = 'Yakinkah data : ' + nama + ' mau dihapus?';
	var atext = 'Data :  ' + nama + ' tidak akan dapat dikembalikan lagi!';
	Swal.fire({
		title: atitle,
		text: atext,
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya Hapus',
		cancelButtonText: 'Batal'
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				type: "POST",
				url: "<?= site_url('jemaat/hapus_data') ?>",
				data: {
					id: id
				},
				dataType: "JSON",
				success: function (response) {
					console.log(response.data);
					if (response.sukses) {
						Swal.fire({
    						icon: 'success',
    						title: 'Hapus',
							text: response.sukses
						})
						//getManageData();
						var sek = $('input[type=number][name=sektor]').val();
						var kel = $('input[type=radio][name=kelamin]:checked').val();
						loadSektorData(sek, kel);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
				}
			});
		}
	})
}

function info(id) {
	$.ajax({
		type: "POST",
		url: "<?= site_url('jemaat/form_info') ?>",
		data: {
			id: id
		},
		dataType: "JSON",
		success: function (response) {
			if (response.sukses) {
				$('.viewmodal').html(response.sukses).show();
				$('#modal_info').modal('show');
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
		}
	});
}

$(document).ready(function () {
	var sek = "<?= $sektor ?>";
	var kel = "<?= $kelamin ?>";
	loadSektorData(sek, kel);
	$("input").change(function() {
		var sek = $('input[type=number][name=sektor]').val();
		var kel = $('input[type=radio][name=kelamin]:checked').val();
		loadSektorData(sek, kel);
	});
});
</script>

<div class="viewmodal" style="display: none;"></div>
<?= $this->endSection() ;?><!-- Section pageScripts -->
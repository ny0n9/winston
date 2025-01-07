let dtable_users = null; /* agar dapat reload datatables : dtable.ajax.reload(null, false); */

function list_users() {
	dtable_users = $('#data_users').DataTable({
		serverSide: true,
		processing: true,
		ajax: {
			type: 'POST',
			url: base_url + 'pengguna/list_users',
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			dataType: "JSON",
			data: csrf,
		},
		drawCallback: function(settings) {
			console.log('ID : ' + settings.aoData[0]._aData[2] + ', Email : ' + settings.aoData[0]._aData[3] + ', Username : ' + settings.aoData[0]._aData[4]); /* data dari record pertama : idx 0 */
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
		columnDefs: [
			{ targets: 0, orderable: false, class: "nowrap"	},
			{ targets: 1, orderable: false, visible: true },
			{ targets: 2, visible: true },
			{ targets: 3, visible: true },
			{ targets: 4, visible: true },
			{ targets: 5, visible: false },
			{ targets: 6, visible: true },
			{ targets: 7, visible: true, render: DataTable.render.datetime('DD/MM/YYYY HH:mm:ss') },
			{ targets: 8, visible: true, render: DataTable.render.datetime('DD/MM/YYYY HH:mm:ss') }
		],
		paging: true,
		pagingType: 'full_numbers',
		pageLength: 25,
		order: [
			[2, 'ASC']
		],
		scrollX: true
	});
}
/* Untuk butto aksi yang ditampilkan lewat datatables tidak dapat menggunakan
	$('button.info_user').click(function(e)
   tapi harus menggunakan inline onclick="nama_fungsi(params)"
*/
function infoUser(key) {
	let fd = {};
	fd['id'] = key;
	fd[csrfkey] = csrf[csrfkey];
	$.ajax({
		url: base_url + 'pengguna/info_user',
		headers: {
			'X-Requested-With': 'XMLHttpRequest'
		},
		type: "POST",
		dataType: "JSON",
		data: fd,
		success: function(response) {
			//console.log(response.user);
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
	let fd = {};
	fd['id'] = key;
	fd[csrfkey] = csrf[csrfkey];
	$.ajax({
		url: base_url + 'pengguna/form_del_user',
		headers: {
			'X-Requested-With': 'XMLHttpRequest'
		},
		type: "POST",
		dataType: "JSON",
		data: fd,
		success: function(response) {
			/* console.log(response.user); */
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
	let fd = {};
	fd['id'] = key;
	fd[csrfkey] = csrf[csrfkey];
	$.ajax({
		url: base_url + 'pengguna/form_edit_user',
		headers: {
			'X-Requested-With': 'XMLHttpRequest'
		},
		type: "POST",
		dataType: "JSON",
		data: fd,
		success: function(response) {
			/* console.log(response.user); */
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
	list_users();
	$('button.btn-add_user').click(function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: base_url + 'pengguna/form_add_user',
			dataType: "JSON",
			data: csrf,
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
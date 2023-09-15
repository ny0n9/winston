<?php helper('form'); ?>
<div class="modal fade" id="modal_add_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_add_userLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal_add_userLabel">Form Add Pengguna</h4>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('pengguna/simpan_users', ['class' => 'form_add_user', 'id' => 'form_add_user']) ?>
			<?= csrf_field() ?>
			<div class="modal-body">
				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="text" class="form-control is-valid" id="email" name="email">
						<div class="valid-feedback d-block text-danger error_email"></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-sm-3 col-form-label">Username</label>
					<div class="col-sm-9">
						<input type="text" class="form-control is-valid" id="username" name="username">
						<div class="valid-feedback d-block text-danger error_username"></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="password" class="col-sm-3 col-form-label">Password</label>
					<div class="col-sm-9">
						<input type="password" class="form-control is-valid" id="password" name="password">
						<div class="valid-feedback d-block text-danger error_password"></div>
					</div>
				</div>
				<div class="form-group row">
					<label for="passconf" class="col-sm-3 col-form-label">Ulangi Password</label>
					<div class="col-sm-9">
						<input type="password" class="form-control is-valid" id="passconf" name="passconf">
						<div class="valid-feedback d-block text-danger error_passconf"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
				<button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
			</div>
			<?= form_close(); ?>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	$('.form_add_user').submit(function(e) {
		e.preventDefault();
		var form = $('#form_add_user')[0];
		var fdata = new FormData(form);
		$.ajax({
			type: "POST",
			enctype: 'multipart/form-data',
			url: $(this).attr('action'),
			data: fdata,
			dataType: "JSON",
			processData: false,
			contentType: false,
			cache: false,
			timeout: 10000, // 10 detik
			success: function(response) {
				if (response.error) {
					if (response.error.email) {
						$('#email').addClass('is-invalid').removeClass('is-valid');
						$('.error_email').html(response.error.email);
					} else {
						$('#email').addClass('is-valid').removeClass('is-invalid');
						$('.error_email').html('');
					}
					if (response.error.username) {
						$('#username').addClass('is-invalid').removeClass('is-valid');
						$('.error_username').html(response.error.username);
					} else {
						$('#username').addClass('is-valid').removeClass('is-invalid');
						$('.error_username').html('');
					}
					if (response.error.password) {
						$('#password').addClass('is-invalid').removeClass('is-valid');
						$('.error_password').html(response.error.password);
					} else {
						$('#password').addClass('is-valid').removeClass('is-invalid');
						$('.error_password').html('');
					}
					if (response.error.passconf) {
						$('#passconf').addClass('is-invalid').removeClass('is-valid');
						$('.error_passconf').html(response.error.passconf);
					} else {
						$('#passconf').addClass('is-valid').removeClass('is-invalid');
						$('.error_passconf').html('');
					}
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Tambah Data Users',
						text: response.sukses,
						footer: 'Berhasil'
					});
					$('#modal_add_user').modal('hide');
					dtable_users.ajax.reload(null, false);
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
			}
		});
		return false;
	});
</script>
<?php helper('form'); ?>
<!-- Modal -->
<div class="modal fade" id="del_user" tabindex="-1" aria-labelledby="del_userLabel" aria-hidden="true">
	<!-- Pada class modal-dialog dapat disisipkan modal-lg atau modal-xl -->
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="del_userLabel">Hapus data berikut</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open('pengguna/hapus_user', ['class' => 'form_del_user', 'id' => 'form_del_user']) ?>
			<div class="modal-body">
				<?= csrf_field() ?>
				<input type="hidden" class="form-control" id="id" name="id" value="<?= $id ?>">
				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-sm-3 col-form-label">Username</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" readonly>
					</div>
				</div>
				<div class="form-check">
					<input type="checkbox" class="form-check-input" id="active" name="active">
					<label for="active" class="form-check-label"><?= ($active == 1) ? 'Aktif' : 'Tidak Aktif'; ?></label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Hapus</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		var active = <?= $active ?>;
		$(':input[type=checkbox]').prop('checked', active);
		$('.form_del_user').submit(function(e) {
			e.preventDefault();
			//var form = $('#form_del_user')[0];
			var fdata = new FormData($('#form_del_user')[0]);
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
					if (response.sukses) {
						Swal.fire({
							icon: 'success',
							title: 'Hapus Data User : ',
							text: response.sukses,
							footer: 'Berhasil'
						});
						$('#del_user').modal('hide');
						dtable_users.ajax.reload(null, false);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
				}
			});
			return false;
		});

		$(':input[type=checkbox]').change(function(e) {
			e.preventDefault;
			if (this.checked) {
				active = 1;
				$(this).next('label').text('Aktif');
				Swal.fire('Checkbox is checked, active = ' + active);
			} else {
				active = 0;
				$(this).next('label').text('Tidak Aktif');
				Swal.fire('Checkbox is unchecked, active = ' + active);
			}
			$(this).prop('checked', active);
		});

	});
</script>
<?php helper('form'); ?>
<!-- Modal -->
<div class="modal fade" id="edit_user" tabindex="-1" aria-labelledby="edit_userLabel" aria-hidden="true">
	<!-- Pada class modal-dialog dapat disisipkan modal-lg atau modal-xl -->
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="del_userLabel">Hapus data berikut</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open('pengguna/update_user', ['class' => 'form_edit_user', 'id' => 'form_edit_user']) ?>
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
				<button type="submit" class="btn btn-primary">Ubah</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		var active = <?= $active ?>;

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

		$(':input[type=checkbox]').prop('checked', active);
		$('.form_edit_user').submit(function(e) {
			e.preventDefault();
			//var form = $('#form_edit_user')[0];
			var fdata = new FormData($('#form_edit_user')[0]);
			fdata.delete('active');
			fdata.append('active', active);
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
							title: 'Ubah Data User : ',
							text: response.sukses,
							footer: 'Berhasil'
						});
						$('#edit_user').modal('hide');
						dtable_users.ajax.reload(null, false);
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "n" + thrownError);
				}
			});
			return false;
		});

	});
</script>
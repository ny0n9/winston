<div class="modal fade" id="info_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="info_userLabel" aria-hidden="true">
	<!-- Pada class modal-dialog dapat disisipkan modal-lg atau modal-xl -->
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="info_userLabel">Data Pengguna</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row mt-0">
					<div class="col-sm-3">ID</div>
					<div class="col-sm-9"><?= $id ?></div>
				</div>
				<div class="row mt-0">
					<div class="col-sm-3">Email</div>
					<div class="col-sm-9"><?= $email ?></div>
				</div>
				<div class="row mt-0">
					<div class="col-sm-3">Username</div>
					<div class="col-sm-9"><?= $username ?></div>
				</div>
				<div class="row mt-0">
					<div class="col-sm-3">Password Hash</div>
					<div class="col-sm-9"><?= $password_hash ?></div>
				</div>
				<div class="row mt-0">
					<div class="col-sm-3">Created At</div>
					<div class="col-sm-9"><?= $created_at ?></div>
				</div>
				<div class="row mt-0">
					<div class="col-sm-3">Updated At</div>
					<div class="col-sm-9"><?= $updated_at ?></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
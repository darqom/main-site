<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<button class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#addUserModal"><i class="fas fa-plus"></i> Tambah Pengelola</button>
				<div class="table-responsive mt-4">
					<table class="table table-striped table-bordered table-hover" id="tbl-users">
						<thead>
							<tr>
								<th>#</th>
								<th>Username</th>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Role</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addUserModalLabel">Tambah Pengelola</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="add-user-form">
				<div class="modal-body">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username">
						<small class="text-danger username-error"></small>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
						<small class="text-danger email-error"></small>
					</div>
					<div class="form-group">
						<label for="fullname">Nama Lengkap</label>
						<input type="text" class="form-control" id="fullname" name="fullname">
						<small class="text-danger fullname-error"></small>
					</div>
					<div class="form-group">
						<label for="gender">Jenis Kelamin</label>
						<select name="gender" id="gender" class="form-control">
							<option value="l">Laki - Laki</option>
							<option value="p">Perempuan</option>
						</select>
						<small class="text-danger gender-error"></small>
					</div>
					<div class="form-group">
						<label for="role">Role</label>
						<select name="role" id="role" class="form-control">
							<option value="2">User</option>
							<option value="1">Admin</option>
						</select>
						<small class="text-danger role-error"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

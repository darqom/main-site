<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<button class="btn btn-primary float-right mb-4" data-toggle="modal" data-target="#addAnnounceModal"><i class="fas fa-plus"></i> Tambah Pengumuman</button>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="tbl-announces">
						<thead>
							<tr>
								<th>#</th>
								<th>Tanggal</th>
								<th>Pengumuman</th>
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

<!-- Modals -->
<div class="modal fade" id="addAnnounceModal" tabindex="-1" role="dialog" aria-labelledby="addAnnounceModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addAnnounceModalLabel">Tambah Pengumuman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="add-announce-form">
				<div class="modal-body">
					<div class="form-message"></div>
					<div class="form-group">
						<label for="title">Judul Pengumuman</label>
						<input type="text" class="form-control" id="title" name="title">
						<small class="text-danger title-error"></small>
					</div>
					<div class="form-group">
						<label for="content">Keterangan</label>
						<textarea name="content" id="content" class="form-control"></textarea>
						<small class="text-danger content-error"></small>
					</div>
					<div class="form-group">
						<label for="date">Tanggal</label>
						<input type="date" class="form-control" id="date" name="date">
						<small class="text-danger date-error"></small>
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

<div class="modal fade" id="editAnnounceModal" tabindex="-1" role="dialog" aria-labelledby="editAnnounceModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editAnnounceModalLabel">Edit Pengumuman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="edit-announce-form">
				<div class="modal-body">
					<div class="form-message"></div>
					<input type="hidden" name="id" id="edit-id">
					<div class="form-group">
						<label for="edit-title">Judul Pengumuman</label>
						<input type="text" class="form-control" id="edit-title" name="title">
						<small class="text-danger edit-title-error"></small>
					</div>
					<div class="form-group">
						<label for="edit-content">Keterangan</label>
						<textarea name="content" id="edit-content" class="form-control"></textarea>
						<small class="text-danger edit-content-error"></small>
					</div>
					<div class="form-group">
						<label for="edit-date">Tanggal</label>
						<input type="date" class="form-control" id="edit-date" name="date">
						<small class="text-danger edit-date-error"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

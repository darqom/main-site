<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h6>Daftar Kegiatan</h6>
			</div>
			<div class="card-body">
				<button class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#addEventModal"><i class="fas fa-plus"></i> Tambah Kegiatan</button>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="tbl-events">
						<thead>
							<tr>
								<th>#</th>
								<th>Tanggal</th>
								<th>Waktu</th>
								<th>Kegiatan</th>
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
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addEventModalLabel">Tambah Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="add-event-form">
				<div class="modal-body">
					<div class="form-message"></div>
					<div class="form-group">
						<label for="title">Nama Kegiatan</label>
						<input type="text" class="form-control" id="title" name="title">
						<small class="text-danger title-error"></small>
					</div>
					<div class="form-group">
						<label for="description">Deskripsi</label>
						<textarea name="description" id="description" class="form-control"></textarea>
						<small class="text-danger description-error"></small>
					</div>
					<div class="form-group">
						<label for="date">Tanggal</label>
						<input type="date" class="form-control" id="date" name="date">
						<small class="text-danger date-error"></small>
					</div>
					<div class="form-row">
						<div class="form-group col-6">
							<label for="time">Waktu Mulai</label>
							<input type="time" class="form-control" id="time" name="time">
							<small class="text-danger time-error"></small>
						</div>
						<div class="form-group col-6">
							<label for="time2">Waktu Selesai</label>
							<input type="time" class="form-control" id="time2" name="time2">
							<small class="text-danger time2-error"></small>
						</div>
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

<div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editEventModalLabel">Edit Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="edit-event-form">
				<div class="modal-body">
					<div class="form-message"></div>
					<input type="hidden" name="id" id="edit-id">
					<div class="form-group">
						<label for="edit-title">Nama Kegiatan</label>
						<input type="text" class="form-control" id="edit-title" name="title">
						<small class="text-danger edit-title-error"></small>
					</div>
					<div class="form-group">
						<label for="edit-description">Deskripsi</label>
						<textarea name="description" id="edit-description" class="form-control"></textarea>
						<small class="text-danger edit-description-error"></small>
					</div>
					<div class="form-group">
						<label for="edit-date">Tanggal</label>
						<input type="date" class="form-control" id="edit-date" name="date">
						<small class="text-danger edit-date-error"></small>
					</div>
					<div class="form-row">
						<div class="form-group col-6">
							<label for="edit-time">Waktu Mulai</label>
							<input type="time" class="form-control" id="edit-time" name="time">
							<small class="text-danger edit-time-error"></small>
						</div>
						<div class="form-group col-6">
							<label for="edit-time2">Waktu Selesai</label>
							<input type="time" class="form-control" id="edit-time2" name="time2">
							<small class="text-danger edit-time2-error"></small>
						</div>
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

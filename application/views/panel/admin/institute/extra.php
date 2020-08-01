<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h6>Daftar Ekstrakuliker</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="tbl-extra">
						<thead>
							<tr>
								<th>#</th>
								<th>Gambar</th>
								<th>Nama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h6>Tambah Ekstrakulikuler</h6>
			</div>
			<div class="card-body">
				<form action="" method="post" enctype="multipart/form-data" id="form-add-extra">
					<div class="form-group">
						<label for="name">Nama</label>
						<input type="text" class="form-control" name="name">
						<small class="text-danger name-error"></small>
					</div>
					<div class="form-group">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="extra-cover"><i class="fas fa-image"></i></span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="extra-cover-input" aria-describedby="extra-cover" accept="image/*" name="image">
								<label class="custom-file-label" for="extra-cover-input">Pilih Gambar</label>
							</div>
						</div>
						<div id="prev-img"></div>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-success" type="submit"><i class="fas fa-plus"></i> Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

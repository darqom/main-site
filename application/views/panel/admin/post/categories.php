<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h6>Daftar Kategori</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="tbl-categories">
						<thead>
							<tr>
								<th>Nama Kategori</th>
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
		<form action="" id="add-category-form">
			<div class="card">
				<div class="card-header">
					<h6>Tambah Kategori</h6>
				</div>
				<div class="card-body">
					<div class="loader"></div>
					<div class="form-group">
						<label for="category">Nama Kategori</label>
						<input type="text" class="form-control" name="category" id="category" autofocus="true">
						<small class="text-danger category-error"></small>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary float-right" type="submit"><i class="far fa-save"></i> Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>

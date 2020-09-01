<?php 
function generate_color($i){
	switch ($i) {
		case 0:
		return 'primary';
		break;
		case 1:
		return 'success';
		break;
		case 2:
		return 'danger';
		break;
	}
}
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h6>Fasilitas Unggulan</h6>
			</div>
			<div class="card-body">
				<div class="row" id="list-fasilities-icon-container">
					<?php for($i = 0; $i < 3; $i++): ?>
						<div class="col-md-4">
							<div class="card shadow card-statistic-1">
								<span class="card-icon bg-<?= generate_color($i); ?>">
									<i class="fas <?= $facilities[0][$i]['facility_icon']; ?>"></i>
								</span>
								<div class="card-wrap">
									<div class="card-header"></div>
									<div class="card-body">
										<?= $facilities[0][$i]['facility_name']; ?>
									</div>
								</div>
								<a href="#" style="font-size: 1em;" class="btn-edit-facility mr-2" data-id="<?= $facilities[0][$i]['id']; ?>">Edit</a>
								<a href="<?= base_url('admin/institute/facility_article/'.$facilities[0][$i]['id']); ?>" style="font-size: 1em;">Artikel</a>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row" id="list-fasilities-image-container">
					<?php for($i = 0; $i < 3; $i++): ?>
						<div class="col-md-4">
							<div class="card shadow">
								<div class="card-body">
									<h6 style="display: inline-block;"><?= $facilities[1][$i]['facility_name']; ?></h6>
									<button class="btn btn-sm btn-outline-dark float-right mb-2 btn-edit-facility" data-id="<?= $facilities[1][$i]['id']; ?>"><i class="fas fa-pencil-alt"></i></button>
									<a href="<?= base_url('admin/institute/facility_article/'.$facilities[1][$i]['id']); ?>" class="btn btn-sm btn-outline-dark float-right mb-2 mr-2"><i class="fas fa-paste"></i></a>
									<img src="<?= base_url('assets/img/facility/'.$facilities[1][$i]['facility_image']); ?>" alt="Image" width="100%" class="rounded">
								</div>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modals -->
<div class="modal fade" id="modalEditFacility1" tabindex="-1" role="dialog" aria-labelledby="modalEditFacility1Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditFacility1Label">Edit Fasilitas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="edit-facility-form">
				<div class="modal-body" id="editFaclity1Container">
					<div class="form-message"></div>
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="facility_name">Nama Fasilitas</label>
						<input type="text" id="facility_name" class="form-control" name="name">
						<small class="text-danger name-error"></small>
					</div>
					<div class="form-group">
						<label for="facility_icon">Ikon</label>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text" id="fa-icon">fas</span>
							</div>
							<input type="text" class="form-control" id="facility_icon" aria-describedby="fa-icon" name="icon">
						</div>
						<small>Silahkan lihat pada <a target="blank" href="https://fontawesome.com/icons">Font Awesome</a> untuk melihat daftar ikon.</small>
						<small class="text-danger icon-error"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Edit</button>	
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modalEditFacility2" tabindex="-1" role="dialog" aria-labelledby="modalEditFacility2Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditFacility2Label">Edit Fasilitas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="edit-facility2-form" enctype="multipart/form-data">
				<div class="modal-body" id="editFaclity2Container">
					<div class="form-message"></div>
					<input type="hidden" name="id" id="id2">
					<div class="form-group">
						<label for="facility_name2">Nama Fasilitas</label>
						<input type="text" id="facility_name2" class="form-control" name="name">
						<small class="text-danger name-error"></small>
					</div>
					<div class="form-group">
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputImage">Upload</span>
							</div>
							<div class="custom-file">
								<input type="file" accept="image/*" class="custom-file-input" id="image-input" aria-describedby="inputImage" name="image">
								<label class="custom-file-label" for="image-input">Pilih Gambar</label>
							</div>
						</div>
						<small class="text-muted">Resolusi terbaik adalah 1200 x 720</small>
					</div>
					<div class="form-group text-center" id="image-preview2">
						<img alt="Image" id="image2" width="50%">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Edit</button>	
				</div>
			</form>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4>Artikel</h4>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<textarea name="article" id="facility-article"><?= $facility['facility_article']; ?></textarea>
					<small class="text-danger"><?= form_error('article'); ?></small>
					<button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<h4>Detail Fasilitas</h4>
			</div>
			<div class="card-body">
				<h6>Nama: <?= $facility['facility_name']; ?></h6>
			</div>
		</div>
	</div>
</div>

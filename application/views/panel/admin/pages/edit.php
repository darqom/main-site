<form action="" method="post" id="form-edit-page">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
						<input name="title" type="text" class="form-control" placeholder="Judul Halaman" id="page-title" value="<?= $page['page_title']; ?>">
						<small class="text-danger title-error"></small>
				</div>
			</div>
			<div class="card mt-4">
				<div class="card-body">
					<textarea name="content" id="page-content"><?= $page['page_content']; ?></textarea>
					<small class="text-danger content-error"></small>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h6>URL Halaman</h6>
					<div class="p-2 bg-light rounded">
						<h6 id="page-link-preview"><?= base_url('page/'.$page['page_slug']); ?></h6>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body text-center">
					<button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>
</form>

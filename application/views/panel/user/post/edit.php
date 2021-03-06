<?php 
$pCategories = explode('+', $post['post_categories']);
?>
<form action="" method="post" id="edit-post-form" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?= $post['id']; ?>">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<input name="title" type="text" class="form-control" placeholder="Judul Pos" id="title" autocomplete="false" value="<?= $post['post_title']; ?>" autofocus>
					<small class="text-danger title-error"></small>
				</div>
			</div>

			<div class="card">
				<div class="card-body post-content-container">
					<textarea name="content" id="post-content"><?= $post['post_content']; ?></textarea>
					<small class="text-danger content-error"></small>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<h6 data-toggle="collapse" data-target="#cat-collapse" class="has-arrow"><i class="far fa-list-alt"></i> Kategori</h6>
				</div>
				<div class="collapse in" id="cat-collapse">
					<div class="card-body category-container">
						<?php foreach($categories as $category): ?>
							<?php $id = $category['id']; ?>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="<?= $id; ?>" id="cat-<?= $id; ?>" name="categories[]" <?= (in_array($id, $pCategories)) ? 'checked' : ''; ?>>
								<label class="form-check-label" for="cat-<?= $id; ?>">
									<?= $category['category_name']; ?>
								</label>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="card-footer pb-3">
						<div class="btn btn-sm btn-info float-right mb-3 has-dropdown" data-toggle="modal" data-target="#addCategoryModal"><i class="fas fa-plus"></i> Tambah Kategori</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h6><i class="far fa-paper-plane"></i> Publikasi</h6>
				</div>
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-6">
							<label for="status">Status</label>
							<select name="status" id="status" class="form-control form-control-sm">
								<option value="publish" <?= ($post['post_status'] == 'publish') ? 'selected' : ''; ?>>Diterbitkan</option>
								<option value="draft" <?= ($post['post_status'] == 'draft') ? 'selected' : ''; ?>>Konsep</option>
							</select>
						</div>
						<div class="form-group col-6">
							<label for="access">Akses</label>
							<select name="access" id="access" class="form-control form-control-sm">
								<option value="public" <?= ($post['post_visibility'] == 'public') ? 'selected' : ''; ?>>Publik</option>
								<option value="private" <?= ($post['post_visibility'] == 'private') ? 'selected' : ''; ?>>Privat</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="comment">Komentar</label>
						<select name="comment" id="comment" class="form-control form-control-sm">
							<option value="allow" <?= ($post['comment_status'] == 'allow') ? 'selected' : ''; ?>>Diizinkan</option>
							<option value="deny" <?= ($post['comment_status'] == 'deny') ? 'selected' : ''; ?>>Tidak Diizinkan</option>
						</select>
					</div>
					<div class="custom-file">
						<input type="file" name="cover" class="custom-file-input" id="image-cover" accept="image/*">
						<label for="image-cover" class="custom-file-label">Gambar Unggulan</label>
					</div>
					<div class="prev-img">
						<?php if($post['post_cover'] != null): ?>
							<img src="<?= base_url('assets/img/post/'.$post['post_cover']); ?>" alt="Cover" width="100%">
						<?php endif; ?>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-primary float-right" type="submit"><i class="far fa-save"></i> Simpan</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- Modals -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="" method="post" id="add-category-form">
				<div class="modal-header">
					<h5 class="modal-title" id="addCategoryModalLabel">Tambah Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="loader"></div>
					<div class="form-group">
						<label for="category">Kategori</label>
						<input type="text" class="form-control" name="category" id="category" autofocus="true">
						<small class="text-danger category-error"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

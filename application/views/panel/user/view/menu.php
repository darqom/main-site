<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h4>Struktur Menu</h4>
			</div>
			<div class="card-body" id="list-menu-container">
				<?php foreach($menus as $menu): ?>
					<div class="border rounded mt-1 p-2">
						<h6 <?php if($menu['sub_menu'] != null): ?>data-toggle="collapse" data-target="#menu-item<?= $menu['id']; ?>"aria-expanded="false" class="has-arrow m-0"<?php endif; ?>><?= $menu['label']; ?> <span class="float-right mr-4">
							<button class="btn btn-sm btn-outline-primary btn-edit-menu" data-id="<?= $menu['id']; ?>"><i class="fas fa-pencil-alt"></i></button></span>
						</h6>
						<?php if($menu['sub_menu'] != null): ?>
							<div class="in collapse p-2 mt-2 bg-light rounded" id="menu-item<?= $menu['id']; ?>">
								<?php foreach($menu['sub_menu'] as $subMenu): ?>
									<h6 class="ml-2 mb-3"><?= $subMenu['label']; ?>
									<button class="btn btn-sm btn-outline-primary float-right mr-4 btn-edit-sub-menu" data-id="<?= $subMenu['id']; ?>"><i class="fas fa-pencil-alt"></i></button>
								</h6>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="card">
		<div class="card-header">
			<h4>Tambah Menu</h4>
		</div>
		<div class="card-body">
			<form action="" method="post" id="form-add-menu">
				<div class="form-group">
					<label for="label">Label</label>
					<input type="text" class="form-control form-control-sm" id="label" name="label">
					<small class="text-danger label-error"></small>
				</div>
				<div class="form-group">
					<label for="link">Tautan</label>
					<input type="text" class="form-control form-control-sm" id="link" name="link">
					<small class="text-danger link-error"></small>
				</div>
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="is-sub-menu" value="submenu">
					<label for="is-sub-menu" class="form-check-label">Sub Menu</label>
				</div>
				<div id="sub-menu-add"></div>
				<div class="form-group">
					<button class="btn btn-sm btn-primary float-right" type="submit"><i class="fas fa-plus"></i> Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>

<!-- Modals -->
<div class="modal fade" id="modalEditMenu" tabindex="-1" role="dialog" aria-labelledby="modalEditMenuLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEditMenuLabel">Edit Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" id="edit-menu-form">
				<div class="modal-body" id="editFaclity1Container">
					<div class="edit-message"></div>
					<input type="hidden" name="id" id="edit-id">
					<div class="form-group">
						<label for="edit-label">Label</label>
						<input type="text" id="edit-label" class="form-control" name="label">
						<small class="text-danger edit-label-error"></small>
					</div>
					<div class="form-group">
						<label for="edit-link">Tautan</label>
						<div class="input-group mb">
							<div class="input-group-prepend">
								<span class="input-group-text" id="base-url-label"><?= base_url(); ?></span>
							</div>
							<input type="text" class="form-control" id="edit-link" aria-describedby="base-url-label" name="link">
						</div>
						<small class="text-danger edit-link-error"></small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary float-left mr-4" data-dismiss="modal"><i class="far fa-times-circle"></i> Batal</button>
					<button type="button" class="btn btn-danger btn-del-menu" id="delete-id"><i class="fas fa-trash-alt"></i> Hapus</button>
					<button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Edit</button>	
				</div>
			</form>
		</div>
	</div>
</div>

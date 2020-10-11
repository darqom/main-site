<div class="section-body">
	<div id="output-status"></div>
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<h4>Pindah ke</h4>
				</div>
				<div class="card-body">
					<ul class="nav nav-pills flex-column">
						<li class="nav-item"><a href="<?= base_url('admin/settings/general'); ?>" class="nav-link">Umum</a></li>
						<li class="nav-item"><a href="<?= base_url('admin/settings/smtp'); ?>" class="nav-link active">SMTP</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<form id="save-smtp-form">
				<div class="card" id="settings-card">
					<div class="card-header">
						<h4><i class="far fa-envelope"></i> Pengaturan SMTP</h4>
					</div>
					<div class="card-body">
						<p class="text-muted">SMTP Server digunakan untuk mengkonfigurasi email pemberitahuan.</p>
						
						<div class="form-group row">
							<div class="col-8">
								<label for="smtp-host">Host</label>
								<input type="text" class="form-control" id="smtp-host" name="smtp-host" value="<?= get_option('smtp_host'); ?>">
								<small class="text-danger smtp-host-error"></small>
							</div>
							<div class="col-4">
								<label for="smtp-port">Port</label>
								<input type="number" class="form-control" id="smtp-port" name="smtp-port" value="<?= get_option('smtp_port'); ?>">
								<small class="text-danger smtp-port-error"></small>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="smtp-username">Username</label>
								<input type="text" class="form-control" id="smtp-username" name="smtp-username" value="<?= get_option('smtp_username'); ?>">
								<small class="text-danger smtp-username-error"></small>
							</div>
							<div class="col-md-6">
								<label for="smtp-password">Password</label>
								<input type="password" class="form-control" id="smtp-password" name="smtp-password" placeholder="Kosongkan jika tidak diubah">
							</div>
						</div>
						<div class="form-group">
							<label for="smtp-name">Nama Pengirim</label>
							<input type="text" class="form-control" id="smtp-name" name="smtp-name" value="<?= get_option('smtp_name'); ?>">
							<small class="text-danger smtp-name-error"></small>
						</div>
					</div>
					<div class="card-footer bg-whitesmoke text-md-right">
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

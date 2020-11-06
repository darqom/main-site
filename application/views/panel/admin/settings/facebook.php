<?php
$appID = decrypt(get_option('fb_app_id'));
$appSecret = decrypt(get_option('fb_app_secret'));
?>
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
						<li class="nav-item"><a href="<?= base_url('admin/settings/smtp'); ?>" class="nav-link">SMTP</a></li>
						<li class="nav-item"><a href="<?= base_url('admin/settings/facebook'); ?>" class="nav-link active">Bot Facebook</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<form id="save-facebook-form">
				<div class="card" id="settings-card">
					<div class="card-header d-flex justify-content-between">
						<h4><i class="far fa-envelope"></i> Pengaturan Bot Facebook</h4>
						<label class="custom-switch mt-2">
							<input type="checkbox" name="status" class="custom-switch-input"<?= get_option('fb_bot_status') == 'on' ? ' checked' : ''; ?>>
							<span class="custom-switch-indicator"></span>
							<span class="custom-switch-description">On/Off</span>
						</label>
					</div>
					<div class="card-body">
						<p class="text-muted">Berfungsi mengirimkan tautan pada fanspage facebook.</p>
						<div class="form-group row">
							<div class="col-md-6">
								<label for="fb-app-id">App ID</label>
								<input type="text" class="form-control" id="fb-app-id" name="fb-app-id" value="<?= $appID; ?>">
								<small class="text-danger fb-app-id-error"></small>
							</div>
							<div class="col-md-6">
								<label for="fb-app-secret">App Secret</label>
								<input type="text" class="form-control" id="fb-app-secret" name="fb-app-secret" value="<?= $appSecret; ?>">
								<small class="text-danger fb-app-secret-error"></small>
							</div>
						</div>
						<div class="form-group">
							<label for="fb-page-token">FB Page Token</label>
							<input type="text" class="form-control" id="fb-page-token" name="fb-page-token" placeholder="Kosongkan jika tidak diubah" autocomplete="off">
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

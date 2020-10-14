<?php 
$imgBanner = base_url('assets/img/site/'.get_option('site_banner'));
$imgLogo = base_url('assets/img/site/'. get_option('site_logo'));
$imgFooter = base_url('assets/img/site/'. get_option('site_footer_logo'));
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
						<li class="nav-item"><a href="<?= base_url('admin/settings/general'); ?>" class="nav-link active">Umum</a></li>
						<li class="nav-item"><a href="<?= base_url('admin/settings/smtp'); ?>" class="nav-link">SMTP</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<form id="save-general-form">
				<div class="card" id="settings-card">
					<div class="card-header">
						<h4><i class="far fa-public"></i> Pengaturan Umum</h4>
					</div>
					<div class="card-body">
						<p class="text-muted">Mengatur tampilan, foto latar belakang, dan lain - lain.</p>
						
						<div class="form-group row">
							<div class="col-md-8">
								<label for="site-title">Judul Situs</label>
								<input type="text" class="form-control" id="site-title" value="<?= get_option('site_title'); ?>" name="site-title">
								<small class="text-danger site-title-error"></small>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 pt-2">
								<label>Foto Banner (best ratio 16:9)</label>
								<div id="banner-preview" class="image-preview" style="height: 175px; background-image: url(<?= $imgBanner; ?>); background-size: cover; background-position: center center;">
									<label id="banner-label" for="banner-upload" class="image-label">Pilih File</label>
									<input type="file" name="site_banner" id="banner-upload" class="image-upload" accept="image/*" />
								</div>
							</div>
							<div class="col-md-6 pt-2">
								<label>Logo Situs (best ratio 1:1)</label>
								<div id="logo-preview" class="image-preview" style="height: 175px; width: 175px; background-image: url(<?= $imgLogo; ?>); background-size: cover; background-position: center center;">
									<label id="logo-label" for="logo-upload" class="image-label">Pilih File</label>
									<input type="file" name="site_logo" id="logo-upload" class="image-upload" accept="image/*" />
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12 text-center pt-2">
								<label>Logo Footer (best ratio 16:9)</label>
								<div id="footer-logo-preview" class="image-preview" style="height: 150px; margin: auto; background-image: url(<?= $imgFooter; ?>); background-size: cover; background-position: center center;">
									<label id="footer-logo-label" for="footer-logo-upload" class="image-label">Pilih File</label>
									<input type="file" name="site_footer_logo" id="footer-logo-upload" class="image-upload" accept="image/*" />
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer bg-whitesmoke text-right">
						<button class="btn btn-primary" type="submit">Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
$socmeds = json_decode(get_option('school_socmeds'), true);
?>
<form action="" id="form-save-profile" method="post">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h6>Tentang Sekolah</h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<textarea name="description" id="" class="form-control" style="min-height: 200px;"><?= get_option('school_description') ?></textarea>
						<small class="text-danger description-error"></small>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h6>Administrasi</h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="phone">Nomor Telepon</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="tel-wrapping"><i class="fas fa-phone"></i></span>
							</div>
							<input type="number" class="form-control" id="phone" name="phone" aria-describedby="tel-wrapping" value="<?= get_option('school_phone') ?>">
						</div>
						<small class="text-danger phone-error"></small>
					</div>
					<div class="form-group">
						<label for="email">Alamat Email</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="mail-wrapping"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="email" class="form-control" id="email" name="email" aria-describedby="mail-wrapping" value="<?= get_option('school_mail') ?>">
						</div>
						<small class="text-danger email-error"></small>
					</div>
					<div class="form-group">
						<label for="address">Alamat Sekolah</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="addr-wrapping"><i class="fas fa-map-marker-alt"></i></span>
							</div>
							<input type="text" class="form-control" id="address" name="address" aria-describedby="addr-wrapping" value="<?= get_option('school_address') ?>">
						</div>
						<small class="text-danger address-error"></small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h6>Video Profil (Youtube)</h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="youtube-embed">Link Youtube</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="youtube-input">https://youtube.com/embed/</span>
							</div>
							<input type="text" class="form-control" id="youtube-embed" name="youtube-embed" aria-describedby="youtube-input" value="<?= get_option('school_youtube_embed') ?>">
						</div>
						<small class="text-danger youtube-embed-error"></small>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<h6>Sosial Media</h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="facebook">ID Facebook</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="fb-wrapping"><i class="fab fa-facebook"></i></span>
							</div>
							<input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="fb-wrapping" value="<?= $socmeds['facebook']['id']; ?>">
						</div>
						<small class="text-danger facebook-error"></small>

						<label for="facebook-name" class="mt-3">Nama Akun Facebook</label>
						<input type="text" class="form-control" id="facebook-name" name="facebook-name" value="<?= $socmeds['facebook']['name']; ?>">
						<small class="text-danger facebook-name-error"></small>
					</div>
					<div class="form-group pt-3">
						<label for="youtube">ID Youtube</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="yt-wrapping"><i class="fab fa-youtube"></i></span>
							</div>
							<input type="text" class="form-control" id="youtube" name="youtube" aria-describedby="yt-wrapping" value="<?= $socmeds['youtube']['id']; ?>">
						</div>
						<small class="text-danger youtube-error"></small>

						<label for="youtube-name" class="mt-3">Nama Akun Youtube</label>
						<input type="text" class="form-control" id="youtube-name" name="youtube-name" value="<?= $socmeds['youtube']['name']; ?>">
						<small class="text-danger youtube-name-error"></small>
					</div>
					<div class="form-group pt-3">
						<label for="instagram">ID Instagram</label>
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text" id="ig-wrapping"><i class="fab fa-instagram"></i></span>
							</div>
							<input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="ig-wrapping" value="<?= $socmeds['instagram']['id']; ?>">
						</div>
						<small class="text-danger instagram-error"></small>

						<label for="instagram-name" class="mt-3">Nama Akun Instagram</label>
						<input type="text" class="form-control" id="instagram-name" name="instagram-name" value="<?= $socmeds['instagram']['name']; ?>">
						<small class="text-danger instagram-name-error"></small>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-6 text-center">
			<button type="submit" class="btn btn-primary mt-2"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</div>
</form>

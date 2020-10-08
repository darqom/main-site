<?php 
$show = $this->input->get('show', true);
?>
<div class="section-body">
  <p class="section-lead">
    Ubah profil anda pada halaman ini.
  </p>

  <div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-5">
      <div class="card profile-widget">
        <div class="profile-widget-header">
          <img alt="image" src="<?= base_url('assets/admin/img/profile/'.$user['image']); ?>" class="rounded-circle profile-widget-picture">
        </div>
        <div class="profile-widget-description">
          <div class="profile-widget-name"><?= $user['fullname']; ?></div>
          <span class="profile-widget-bio"><?= $user['bio']; ?></span>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-12 col-lg-7">
      <div class="card">
        <?php if($show != 'password'): ?>
          <form method="post" id="form-save-profile">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-6 col-12">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" value="<?= $user['fullname'] ?>" name="fullname">
                  <small class="text-danger fullname-error"></small>
                </div>
                <div class="form-group col-md-6 col-12">
                  <label>Email</label>
                  <input type="email" class="form-control" value="<?= $user['email'] ?>" name="email">
                  <small class="text-danger email-error"></small>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-7 col-12">
                  <label>Jenis Kelamin</label>
                  <select name="gender" class="form-control">
                    <option value="l" <?= $user['gender'] == 'l' ? 'selected' : ''; ?>>Laki - Laki</option>
                    <option value="p" <?= $user['gender'] == 'p' ? 'selected' : ''; ?>>Perempuan</option>
                  </select>
                  <small class="text-danger gender-error"></small>
                </div>
                <div class="form-group col-md-5 col-12 text-center">
                  <label for="img-profile" style="display: block;">
                    <img alt="image" src="<?= base_url('assets/admin/img/profile/'.$user['image']); ?>" class="rounded-circle profile-widget-picture img-edit" width="30%">
                  </label>
                  <input type="file" name="image" accept="image/*" id="img-profile" style="display: none;">
                  <small class="text-muted">* biarkan jika tidak ingin diubah</small>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                  <label>Bio</label>
                  <textarea class="form-control summernote-simple" name="bio" id="bio-input"><?= $user['bio']; ?></textarea>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        <?php endif; ?>

        <?php if($show == 'password'): ?>
          <form id="form-save-password">
            <div class="card-header">
              <h4>Edit Password</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 form-message"></div>
              </div>
              <div class="row">
                <div class="form-group col-md-8">
                  <label for="old-pass">Password Lama</label>
                  <input type="password" class="form-control" id="old-pass" name="old-pass">
                  <small class="text-danger old-pass-error"></small>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="new-pass">Password Baru</label>
                  <input type="password" class="form-control" id="new-pass" name="new-pass">
                  <small class="text-danger new-pass-error"></small>
                </div>
                <div class="form-group col-md-6">
                  <label for="confirm-pass">Konfirmasi</label>
                  <input type="password" class="form-control" id="confirm-pass" name="confirm-pass">
                  <small class="text-danger confirm-pass"></small>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

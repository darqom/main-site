<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="<?= base_url('assets/img/site/'.get_option('site_logo')); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Reset Kata Sandi</h4></div>

            <div class="card-body">
              <form method="POST" id="reset-form">
                <div class="form-group">
                  <label for="password">Password Baru</label>
                  <input id="password" type="password" class="form-control" name="password" tabindex="1">
                  <small class="text-danger password-error"><?= form_error('password'); ?></small>
                </div>

                <div class="form-group">
                  <label for="password2">Konfirmasi Password</label>
                  <input id="password2" type="password" class="form-control" name="password2" tabindex="2">
                  <small class="text-danger password2-error"><?= form_error('password2'); ?></small>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Reset Password
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; SMK Darul Muqomah <?= date('Y'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

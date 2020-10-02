<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <img src="<?= base_url('assets/img/logo-sekolah.png'); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
          </div>

          <div class="card card-primary">
            <div class="card-header"><h4>Lupa Kata Sandi</h4></div>

            <div class="card-body">
              <p class="text-muted">Kami akan mengirim email untuk mereset password anda</p>
              <div class="message">
                <?php if($sess = $this->session->flashdata('msg')): ?>
                  <div class="alert alert-<?= $sess['class']; ?>"><?= $sess['msg']; ?></div>
                <?php endif; ?>
              </div>
              <form method="POST" action="" id="forgot-form">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control" name="username" tabindex="1" autofocus autocomplete="off">
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Kirim
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/summernote/summernote-bs4.min.css'); ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/stisla-assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/stisla-assets/css/components.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css'); ?>">
</head>

<body>
  <div id="baseUrl" data-url="<?= base_url(); ?>"></div>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/admin/img/profile/'.$user['image']); ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['username']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profil
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Pengaturan
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('admin/auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('admin/dashboard'); ?>">Admin Panel</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= ($aURL == 'dashboard') ? 'active' : ''; ?>">
              <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data</li>
            <li class="nav-item dropdown <?= ($aURL == 'post') ? 'active' : ''; ?>">
              <a href="" class="nav-link has-dropdown"><i class="fas fa-thumbtack"></i> <span>Pos</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url('admin/post'); ?>" class="nav-link">Semua Pos</a>
                </li>
                <li>
                  <a href="<?= base_url('admin/post/add'); ?>" class="nav-link">Tambah Baru</a>
                </li>
                <li>
                  <a href="<?= base_url('admin/post/category'); ?>" class="nav-link">Kategori</a>
                </li>
              </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url(); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Lihat Situs
            </a>
          </div>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
        </section>

        <?= $contents; ?>
      </div>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        &copy; <?= date('Y'); ?> <div class="bullet"></div> <a href="<?= base_url(); ?>">SMK Darul Muqomah</a>
      </div>
      <div class="footer-right">
        Made with <a href="https://github.com/irsyadulibad">@irsyadulibad</a>
      </div>
    </footer>
  </div>

  <!-- Defining Base URL var -->
  <script> var baseURL = "<?= base_url(); ?>";</script>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets/stisla-assets/js/stisla.js'); ?>"></script>
  <script src="<?= base_url('assets/summernote/summernote-bs4.min.js'); ?>"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('assets/stisla-assets/js/scripts.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/js/script.js'); ?>"></script>
</body>
</html>

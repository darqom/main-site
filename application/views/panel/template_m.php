<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/summernote/summernote-bs4.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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
                  <a href="<?= base_url('admin/post/categories'); ?>" class="nav-link">Kategori</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown <?= ($aURL == 'event') ? 'active' : ''; ?>">
              <a href="" class="nav-link has-dropdown"><i class="fas fa-bullhorn"></i> <span>Event</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url('admin/event'); ?>" class="nav-link">Kegiatan</a>
                </li>
                <li>
                  <a href="<?= base_url('admin/event/announces'); ?>" class="nav-link">Pengumuman</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown <?= ($aURL == 'users') ? 'active' : ''; ?>">
              <a href="" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Pengguna</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url('admin/users'); ?>" class="nav-link">Pengelola</a>
                </li>
              </ul>
            </li>
            <li class="menu-header">Kelembagaan</li>
            <li class="nav-item dropdown <?= ($aURL == 'institute') ? 'active' : ''; ?>">
              <a href="" class="nav-link has-dropdown"><i class="fas fa-school"></i> <span>Tentang Sekolah</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url('admin/institute'); ?>" class="nav-link">Info Sekolah</a>
                </li>
                <li>
                  <a href="<?= base_url('admin/institute/extra'); ?>" class="nav-link">Ekstrakulikuler</a>
                </li>
                <li>
                  <a href="<?= base_url('admin/institute/facility'); ?>" class="nav-link">Fasilitas</a>
                </li>
              </ul>
            </li>
            <li class="menu-header">Website</li>
            <li class="nav-item dropdown <?= ($aURL == 'view') ? 'active' : ''; ?>">
              <a href="" class="nav-link has-dropdown"><i class="fas fa-paint-brush"></i> <span>Tampilan</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url('admin/view/menu'); ?>" class="nav-link">Menu Navigasi</a>
                </li>
              </ul>
            </li>
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

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/stisla-assets/js/stisla.js'); ?>"></script>

  <!-- Plugin JS -->
  <script src="<?= base_url('assets/summernote/summernote-bs4.min.js'); ?>"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('assets/stisla-assets/js/scripts.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/js/helper.js'); ?>"></script>
  <script src="<?= base_url('assets/admin/js/'.$aURL.'.js'); ?>"></script>
</body>
</html>

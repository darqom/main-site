<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?> | SMK Darul Muqomah</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/default.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark green-primary">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="assets/img/logo-sekolah.png" alt="" width="50">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-align-right"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto color-white">
					<a class="nav-item nav-link" href="#">BERANDA</a>
					<a class="nav-item nav-link" href="#">KELEMBAGAAN</a>
					<div class="nav-item dropdown">
						<a class="nav-link text-white dropdown-toggle" href="#" role="button" id="kompetensi" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							KOMPETENSI KEAHLIAN
						</a>
						<div class="dropdown-menu" aria-labelledby="kompetensi">
							<a class="dropdown-item" href="#">Teknik Komputer dan Jaringan</a>
							<a class="dropdown-item" href="#">Teknik Kendaraan Ringan</a>
							<a class="dropdown-item" href="#">Multimedia</a>
						</div>
					</div>
					<a class="nav-item nav-link" href="#">BERITA</a>
					<a class="nav-item nav-link" href="#">MEDIA</a>
					<a class="nav-item nav-link" href="#">HUBUNGI KAMI</a>
				</div>
			</div>
		</div>
	</nav>

	<?= $contents; ?>

	<footer class="pt-55 container-fluid">
		<div class="text-white copyright-content">
			<div class="row pl-50 pr-50">
				<div class="col-md-4 brand">
					<img src="assets/img/logo-full.png" alt="Logo Capt" width="175">
					<ul class="list-unstyled mt-3">
						<li>
							<p><i class="fas fa-phone green-primary-text"></i> (0336) 324654</p>
						</li>
						<li>
							<p><i class="fas fa-envelope green-primary-text"></i> smkdarulmuqomah@gmail.com</p>
						</li>
						<li>
							<p><i class="fas fa-map-marker-alt green-primary-text"></i> JL. Sultan Agung No. 2 - 4 Purwoasri - Gumukmas - Jember</p>
						</li>
					</ul>
				</div>
				<div class="col-md-8 information">
					<div class="row mt-2 justify-content-center">
						<div class="col-md-5 border-top">
							<p class="head">Statistik Pengunjung</p>
							<ul class="list-unstyled mt-3">
								<li>
									<p>Hari Ini: <b><?= $statistics['today_visitors']; ?> Visitor</b> | Total: <?= $statistics['total_visitors']; ?> Visitor</p>
								</li>
								<li>
									<p>Hits Hari ini: <b><?= $statistics['today_hits']; ?> Hits</b> | Total: <?= $statistics['total_hits']; ?> Hits</p>
								</li>
								<li>
									<p>Pengunjung Online: <b><?= $statistics['online_visitors']; ?> Pengunjung</b></p>
								</li>
							</ul>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-5 border-top">
							<p class="head">Contact Us</p>
							<ul class="list-unstyled">
								<li>
									<a href=""><i class="fab fa-facebook-f mr-3"></i> ICT SMK Darul Muqomah</a>
								</li>
								<li>
									<a href=""><i class="fab fa-instagram mr-2"></i> @smkdarulmuqomah</a>
								</li>
								<li>
									<a href=""><i class="fab fa-youtube mr-2"></i> SMK Darul Muqomah</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row copyright">
				<div class="col-12 text-center">
					<p class="mt-2">Copyright &copy; 2020 SMK Darul Muqomah - All Right Reserved</p>
				</div>
			</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Landing Site</title>
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

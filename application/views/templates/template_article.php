<?php
$menus = get_menu();
$cover = '';
if(isset($post))
{
	$img = $post['post_cover'];
	$keyword = $post['post_title'];

	$cover = (strlen($img)) ? 'post/'.$img : 'site/'.get_option('site_banner');
}
else if(isset($page))
{
	$keyword = $page['page_title'];
	$cover = 'site/'.get_option('site_banner');
}
else if(isset($facility))
{
	$img = $facility['facility_image'];
	$keyword = $facility['facility_name'];

	$cover = (strlen($img)) ? 'facility/'.$img : 'site/'.get_option('site_banner');
}else{
	$keyword = '';
	$cover = 'site/'.get_option('site_banner');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="<?= $keyword ?>, SMK Darul Muqomah, Darul Muqomah, Darqom">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?= $title; ?> | <?= get_option('site_title'); ?>">
	<meta property="og:url" content="<?= current_url(); ?>">
	<meta property="og:image" content="<?= base_url('assets/img/'.$cover); ?>">
	<title><?= $title; ?> | <?= get_option('site_title'); ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|EB+Garamond|Lato|Source+Sans+Pro&display=swap">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/default.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark green-primary">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="<?= base_url('assets/img/site/'.get_option('site_logo')); ?>" alt="" width="50">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-align-right"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto color-white">
					<?php foreach($menus as $menu): ?>
						<?php if(is_null($menu['sub_menu'])): ?>
							<a class="nav-item nav-link" href="<?= base_url($menu['link']); ?>"><?= $menu['label']; ?></a>
							<?php else: ?>
								<div class="nav-item dropdown">
									<a class="nav-link text-white dropdown-toggle" href="#" role="button" id="menu<?= $menu['id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?= $menu['label']; ?>
									</a>
									<div class="dropdown-menu" aria-labelledby="menu<?= $menu['id']; ?>"">
										<?php foreach($menu['sub_menu'] as $subMenu): ?>
											<a class="dropdown-item" href="<?= base_url($subMenu['link']); ?>"><?= $subMenu['label']; ?></a>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</nav>

		<div class="container">
			<?= $contents; ?>
		</div>

		<?php 
		$socmeds = json_decode(get_option('school_socmeds'), true);
		$statistics = get_statistics();
		?>
		<footer class="pt-55 container-fluid">
			<div class="text-white copyright-content">
				<div class="row pl-50 pr-50">
					<div class="col-md-4 brand">
						<img src="<?= base_url('assets/img/site/'.get_option('site_footer_logo')); ?>" alt="Logo Capt" width="175">
						<ul class="list-unstyled mt-3">
							<li>
								<p><i class="fas fa-phone green-primary-text"></i> <?= get_option('school_phone'); ?></p>
							</li>
							<li>
								<p><i class="fas fa-envelope green-primary-text"></i> <?= get_option('school_mail'); ?></p>
							</li>
							<li>
								<p><i class="fas fa-map-marker-alt green-primary-text"></i> <?= get_option('school_address'); ?></p>
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
										<a href="https://facebook.com/<?= $socmeds['facebook']['id']; ?>"><i class="fab fa-facebook-f mr-3"></i> <?= $socmeds['facebook']['name']; ?></a>
									</li>
									<li>
										<a href="https://instagram.com/<?= $socmeds['instagram']['id']; ?>"><i class="fab fa-instagram mr-2"></i> <?= $socmeds['instagram']['name']; ?></a>
									</li>
									<li>
										<a href="https://youtube.com/<?= $socmeds['youtube']['id']; ?>"><i class="fab fa-youtube mr-2"></i> <?= $socmeds['youtube']['name']; ?></a>
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
		<script id="dsq-count-scr" src="//darqom.disqus.com/count.js" async></script>
		<script src="<?= base_url('assets/js/script.js'); ?>"></script>
	</body>
	</html>

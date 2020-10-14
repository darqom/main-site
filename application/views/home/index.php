<div class="jumbotron hero-element mb-0" style="background: url(<?= base_url('assets/img/site/'.get_option('site_banner')); ?>) center bottom / cover no-repeat;">
	<div class="hero-content">
		<h5>DAFTARKAN SEGERA DIRIMU DI</h5>
		<h1 class="font-weight-bold">SMK DARUL MUQOMAH</h1>
		<h5>PROGRAM KEAHLIAN: TEKNIK INFORMATIKA DAN OTOMOTIF</h5>

		<button class="btn btn-sm btn-success green-primary mt-4">SELENGKAPNYA</button>
		<button class="btn btn-sm btn-light mt-4 ml-3">DAFTAR</button>
	</div>
</div>

<div class="container-fluid bg-white">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="fasility green-primary rounded shadow">
				<ul class="list-unstyled">
					<?php foreach($facilities[0] as $facility): ?>
						<li class="fasility-item">
							<a href="<?= base_url('facility/'.$facility['facility_slug']); ?>" class="text-white text-center">
								<h2 class="icon"><i class="fas <?= $facility['facility_icon'] ?>"></i></h2>
								<p class="fasility-text"><?= $facility['facility_name'] ?></p>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php foreach($facilities[1] as $facility): ?>
			<div class="col-md-3">
				<div class="card">
					<div class="card-body descript-item">
						<h4 class="mb-4 font-weight-bold head-with-border"><?= $facility['facility_name']; ?></h4>
						<img src="<?= base_url('assets/img/facility/'.$facility['facility_image']); ?>" alt="class" width="100%">
						<p class="mt-2"><?= substr($facility['facility_article'], 0, 116); ?></p>
						<a href="<?= base_url('facility/'.$facility['facility_slug']); ?>" class="btn btn-sm btn-success green-primary">Selengkapnya</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<hr class="ml-4 mr-4 mt-85">
</div>

<div class="container p-4 with-background rounded">
	<div class="row justify-content-center border border-white border-lg p-3">
		<div class="col-md-10">
			<h4 class="text-white reg-with-us">Raih Impianmu Bersama Kami</h4>
		</div>
		<div class="col-md-2 text-center">
			<a class="btn btn-sm btn-light font-weight-bold">DAFTAR SEKARANG</a>
		</div>
	</div>
</div>

<div class="container-fluid bg-light">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h6>Mari Bergabung Bersama Kami!!</h6>
			<h4 class="mt-3 head-with-border font-weight-bold">EKSTRAKULIKULER</h4>
		</div>
	</div>

	<div class="container carousel">
		<div class="owl-carousel owl-theme">
			<?php foreach($extras as $extra): ?>
				<div class="row">
					<div class="col-12">
						<div class="card m-2">
							<div class="card-body descript-item">
								<img src="<?= base_url('assets/img/extra/'.$extra['extra_image']); ?>" alt="class" width="100%">
								<h6 class="font-weight-bold mt-2 text-center"><?= $extra['extra_name']; ?></h6>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<hr class="mt-70">
</div>

<div class="container-fluid bg-white">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<iframe src="https://www.youtube.com/embed/<?= get_option('school_youtube_embed'); ?>" width="100%" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="col-md-6 description">
			<h4 class="head-with-border font-weight-bold">Tentang SMK Darul Muqomah</h4>
			<p align="justify"><?= get_option('school_description'); ?></p>
		</div>
	</div>
</div>

<div class="container-fluid bg-white">
	<div class="row justify-content-center">
		<div class="col-md-4">
			<div class="card shadow mb-4">
				<div class="card-body">
					<h6 class="head-with-border font-weight-bold">Kegiatan</h6>
					<?php foreach($events as $event): ?>
						<?php
						$day = explode('-', $event['event_date'])[2];
						$date = substr(indo_date($event['event_date'], 3), 2);
						$time = explode('-', $event['event_time']);
						?>
						<div class="row no-gutters mt-4	border-bottom	pb-3">
							<div class="col-md-4">
								<button class="btn outline-green-primary event-calendar pb-0" style="min-width: 70px;">
									<h5><?= $day; ?></h5>
									<p><?= $date; ?></p>
								</button>
							</div>
							<div class="col-md-8 pt-2">
								<h6 class="event-title"><?= $event['event_title']; ?></h6>
								<p class="event-time"><i class="far fa-clock green-primary-text"></i> <?= $time[0]; ?> WIB - <?= $time[1]; ?> WIB</p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card shadow mb-4">
				<div class="card-body">
					<h6 class="head-with-border font-weight-bold">Pengumuman</h6>
					<?php foreach($announces as $announce): ?>
						<div class="row no-gutters mt-4 border-bottom pb-4">
							<div class="col-12">
								<p class="event-time announce-date"><i class="far fa-clock green-primary-text"></i> <?= indo_date($announce['announce_date']); ?></p>
								<h6 class="announce-text"><?= $announce['announce_title']; ?></h6>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card shadow mb-4">
				<div class="card-body">
					<h6 class="head-with-border font-weight-bold">Berita Terbaru</h6>
					<?php foreach($posts as $post): ?>
						<div class="row no-gutters mt-4	border-bottom	pb-3 latest-post-card">
							<div class="col-md-4 pr-1">
								<div class="latest-post-img" style="background-image: url('<?= base_url('/assets/img/post/'.$post['post_cover']); ?>');"></div>
							</div>
							<div class="col-md-8 pt-2 pl-1">
								<h6 class="event-title"><a href="<?= base_url('post/'.$post['post_slug']); ?>" class="link"><?= substr($post['post_title'], 0, 45); ?><?php if(strlen($post['post_title']) > 45): ?>...
									<?php endif; ?></a>
								</h6>
								<p class="event-time"><i class="far fa-clock green-primary-text"></i> <?= indo_date($post['created_at']); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

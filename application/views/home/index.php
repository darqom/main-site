<div class="jumbotron hero-element mb-0">
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
					<li class="fasility-item">
						<a href="" class="text-white text-center">
							<h2 class="icon"><i class="fas fa-desktop"></i></h2>
							<p class="fasility-text">Lab Computer</p>
						</a>
					</li>
					<li class="fasility-item">
						<a href="" class="text-white text-center">
							<h2 class="icon"><i class="fas fa-music"></i></h2>
							<p class="fasility-text">Studio Music</p>
						</a>
					</li>
					<li class="fasility-item">
						<a href="" class="text-white text-center">
							<h2 class="icon"><i class="fas fa-home"></i></h2>
							<p class="fasility-text">Ruang BKK</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body descript-item">
					<h4 class="mb-4 font-weight-bold head-with-border">KELAS</h4>
					<img src="assets/img/class.jpg" alt="class" width="100%">
					<p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio doloribus totam, neque necessitatibus explicabo</p>
					<a href="#" class="btn btn-sm btn-success green-primary">Selengkapnya</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body descript-item">
					<h4 class="mb-4 font-weight-bold head-with-border">PERPUS</h4>
					<img src="assets/img/class.jpg" alt="library" width="100%">
					<p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio doloribus totam, neque necessitatibus explicabo</p>
					<a href="#" class="btn btn-sm btn-success green-primary">Selengkapnya</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="card-body descript-item">
					<h4 class="mb-4 font-weight-bold head-with-border">KANTIN</h4>
					<img src="assets/img/class.jpg" alt="canteen" width="100%">
					<p class="mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio doloribus totam, neque necessitatibus explicabo</p>
					<a href="#" class="btn btn-sm btn-success green-primary">Selengkapnya</a>
				</div>
			</div>
		</div>
	</div>
	<hr class="ml-4 mr-4 mt-85">
</div>

<div class="container p-4">
	<div class="row justify-content-center border border-white border-lg p-2">
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
		<div class="col-md-11">
			<h6>Mari Bergabung Bersama Kami!!</h6>
			<h4 class="mt-3 head-with-border font-weight-bold">EKSTRAKULIKULER</h4>
		</div>
		<div class="col-md-1 pt-2 text-right">
			<button class="btn btn-sm btn-outline-dark" href="#carouselExampleControls" data-slide="prev">
				<i class="fas fa-chevron-left"></i>
			</button>
			<button class="btn btn-sm btn-outline-dark" href="#carouselExampleControls" data-slide="next">
				<i class="fas fa-chevron-right"></i>
			</button>
		</div>
	</div>

	<div class="row justify-content-center mt-2">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php $c = 0; ?>
				<?php foreach($extrasGroup as $extras): ?>
					<div class="carousel-item <?= ($c==0) ? 'active' : ''; ?>">
						<div class="row justify-content-center p-1">
							<?php foreach($extras as $extra): ?>
								<div class="col-md-3">
									<div class="card">
										<div class="card-body descript-item">
											<img src="<?= base_url('assets/img/extra/'.$extra['extra_image']); ?>" alt="class" width="100%">
											<h6 class="font-weight-bold mt-2 text-center"><?= $extra['extra_name']; ?></h6>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php $c++; ?>
				<?php endforeach; ?>
			</div>
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
			<div class="card shadow">
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
			<div class="card shadow">
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
			<div class="card shadow">
				<div class="card-body">
					<h6 class="head-with-border font-weight-bold">Berita Terbaru</h6>
					<?php foreach($posts as $post): ?>
						<div class="row no-gutters mt-4	border-bottom	pb-3">
							<div class="col-md-4 pr-1">
								<img src="<?= base_url('assets/img/post/'.$post['post_cover']); ?>" alt="" width="100%">
							</div>
							<div class="col-md-8 pt-2 pl-1">
								<h6 class="event-title"><?= $post['post_title']; ?></h6>
								<p class="event-time"><i class="far fa-clock green-primary-text"></i> <?= indo_date($post['created_at']); ?></p>
								<a href="<?= base_url('post/'.$post['post_slug']); ?>" class="btn btn-sm btn-success green-primary float-right">Selengkapnya</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

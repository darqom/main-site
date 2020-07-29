<?php
$socmeds = json_decode(get_option('school_socmeds'), true);
?>
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
								<p>Hari Ini: <b>10003 Visitor</b> | Total: 34 Visitor</p>
							</li>
							<li>
								<p>Hits Hari ini: <b>10003 Hits</b> | Total: 10010 Hits</p>
							</li>
							<li>
								<p>Pengunjung Online: <b>10003 Pengunjung</b></p>
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
<script src="assets/js/script.js"></script>
</body>
</html>

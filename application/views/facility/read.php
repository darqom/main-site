<div class="row justify-content-center">
	<div class="col-md-7">
		<main id="main-article" class="pt-4">
			<h1 id="article-title" class="mb-4">Fasilitas <?= $facility['facility_name']; ?></h1>
			<?php if($facility['facility_image'] != ''): ?>
				<img src="<?= base_url('assets/img/facility/'.$facility['facility_image']); ?>" alt="Cover" id="img-cover" class="mb-4 rounded">
			<?php endif; ?>
			<div id="article-text" class="pt-3">
				<?= $facility['facility_article']; ?>
			</div>
		</main>

		<div id="cat-list" class="pt-4 pb-3">
			<span class="badge badge-light cat-item p-2 mr-1"><?= $facility['facility_name']; ?></span>
		</div>

		<div id="disqus_thread" class="pt-30"></div>
		<script>
			var disqus_config = function () {
				this.page.url = "<?= current_url() ?>";
				this.page.identifier = '<?= $facility['facility_slug'] ?>';
			};

			(function() {
				var d = document, s = d.createElement('script');
				s.src = 'https://darqom.disqus.com/embed.js';
				s.setAttribute('data-timestamp', +new Date());
				(d.head || d.body).appendChild(s);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	</div>
</div>

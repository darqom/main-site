<?php 
$categories = explode('+', $post['post_categories']);
?>
<div class="row justify-content-center">
	<div class="col-md-7">
		<main id="main-article" class="pt-4">
			<h1 id="article-title" class="mb-4"><?= $post['post_title']; ?></h1>
			<div class="row mb-4">	
				<div class="col-6">
					<p class="text-muted post-date">
						<span style="font-size: .9rem;"><i class="fas fa-user"></i></span> Administrator, 23 Agustus 2020
					</p>
				</div>
				<div class="col-6 text-right">
					<a href="" class="share-button"><i class="fab fa-facebook"></i></a>
					<a href="" class="share-button"><i class="fab fa-twitter"></i></a>
					<a href="" class="share-button"><i class="fas fa-link"></i></a>
				</div>
			</div>
			<?php if($post['post_cover'] != null): ?>
				<img src="<?= base_url('assets/img/post/'.$post['post_cover']); ?>" alt="Cover" id="img-cover" class="mb-4 rounded">
			<?php endif; ?>
			<div id="article-text" class="pt-3">
				<?= $post['post_content']; ?>
			</div>
		</main>

		<div id="cat-list" class="pt-4 pb-3">
			<?php foreach($categories as $category): ?>
				<?php $category = get_category($category); ?>
				<a href="<?= base_url('post/category/'.$category['category_slug']); ?>" class="badge badge-light cat-item p-2 mr-1"><?= $category['category_name']; ?></a>
			<?php endforeach; ?>
		</div>

		<?php if($post['comment_status'] == 'allow'): ?>
			<div id="disqus_thread" class="pt-30"></div>
			<script>
				var disqus_config = function () {
					this.page.url = "<?= current_url() ?>";
					this.page.identifier = '<?= $post['post_slug'] ?>';
				};

				(function() {
					var d = document, s = d.createElement('script');
					s.src = 'https://darqom.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<?php endif; ?>
	</div>
</div>

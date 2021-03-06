<?php 
$categories = explode('+', $post['post_categories']);
?>
<style>
	@media (min-width: 768px){
		.latest-post{
			padding-top: 10%;
		}
	}
</style>

<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-7">
		<main id="main-article" class="pt-4">
			<h1 id="article-title" class="mb-4"><?= $post['post_title']; ?></h1>
			<div class="row mb-4">	
				<div class="col-6">
					<p class="text-muted post-date">
						<span style="font-size: .9rem;"><i class="fas fa-user"></i></span> @<?= $post['post_author'] .', '. indo_date($post['created_at']); ?>
					</p>
				</div>
				<div class="col-6 text-right">
					<a href="https://facebook.com/sharer/sharer.php?u=<?= current_url(); ?>" class="share-button"><i class="fab fa-facebook"></i></a>
					<a href="https://twitter.com/intent/tweet?text=<?= $post['post_title']; ?>&url=<?= current_url(); ?>" class="share-button"><i class="fab fa-twitter"></i></a>
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
	<div class="col-md-4 latest-post">
		<div class="card my-4">
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

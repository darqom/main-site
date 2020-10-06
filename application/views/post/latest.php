<div class="jumbotron jumbotron-fluid text-center category-header">
	<h1>Postingan Terbaru</h1>
</div>

<div class="row justify-content-center mt-4">
	<?php foreach($posts as $post): ?>
		<div class="col-md-4">
			<a class="card article-card mb-4 mt-4" href="<?= base_url('post/'.$post['post_slug']); ?>">
				<div class="card-body p-0">
					<div class="article-card-img" style="background-image: url('<?= base_url('/assets/img/post/'.$post['post_cover']); ?>');"></div>
					<p class="article-card-title">
						<?= substr($post['post_title'], 0, 45); ?>
						<?php if(strlen($post['post_title']) > 45): ?>
							...
						<?php endif; ?>
					</p>
					<p class="article-card-time">
						<i class="far fa-clock green-primary-text"></i>
						<span><?= time_elapsed($post['created_at']); ?></span>
					</p>
				</div>
			</a>
		</div>
	<?php endforeach; ?>
</div>

<div class="row justify-content-center mt-4">
	<div class="col-12">
		<?= $this->pagination->create_links() ?>
	</div>
</div>

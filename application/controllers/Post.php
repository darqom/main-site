<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Post_m', 'post');
	}

	public function index($start = 0){
		$this->load->model('Paginate_m', 'paginate');

		$limit = 9;
		$total = $this->post->total();
		$this->paginate->basic('post/', $total, $limit);

		$data = [
			'posts' => $this->post->get_latest($limit, $start),
			'title' => 'Postingan Terbaru'
		];

		$this->template->load('templates/template_article', 'post/latest', $data);
	}

	public function read($slug = ''){
		$post = $this->post->get_post('post_slug', $slug);
		if(is_null($post)) show_404();

		$data = [
			'post' => $post,
			'title' => $post['post_title']
		];

		$this->template->load('templates/template_article', 'post/read', $data);
	}

	public function category($slug = '', $start = 0){
		$category = $this->post->get_category('category_slug', $slug);
		if(is_null($category)) show_404();
		$this->load->model('Paginate_m', 'paginate');

		$limit = 9;
		$posts = $this->post->get_by_category($category['id'], $limit, $start);
		$total = $this->post->total_by_category($category['id']);
		$this->paginate->basic('post/category/'.$slug, $total, $limit);

		$data = [
			'category' => $category,
			'posts' => $posts,
			'total_post' => $total,
			'title' => 'Kategori ' . $category['category_name']
		];
		
		$this->template->load('templates/template_article', 'post/category', $data);
	}
}

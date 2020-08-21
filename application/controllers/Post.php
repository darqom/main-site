<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Post_m', 'post');
	}

	public function read($slug = ''){
		$post = $this->post->get_post('post_slug', $slug);
		if(is_null($post)) show_404();

		$data['post'] = $post;
		$data['title'] = $post['post_title'];
		$this->template->load('templates/template_article', 'post/read', $data);
	}
}

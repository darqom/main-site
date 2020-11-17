<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Pages_m', 'pages');
	}

	public function read($slug = ''){
		$page = $this->pages->get_page('page_slug', $slug);
		if(is_null($page)) show_404();

		$data = [
			'page' => $page,
			'title' => $page['page_title'],
		];

		$this->template->load('templates/template_article', 'page/read', $data);
	}
}

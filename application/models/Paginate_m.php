<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paginate_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	}

	public function basic($url, $total, $per_page = 5){
		$config['base_url'] = base_url($url);
		$config['total_rows'] = $total;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = count(explode('/', $url)) + 1;
		$config['num_links'] = 2;
		$config['first_link'] = false;
		$config['last_link'] = false;
        // Styling
		$config['attributes'] = array('class' => 'page-link');
		$config['full_tag_open'] = '<nav class="m-auto"><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item" aria-current="page"><a class="page-link green-primary text-white" href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
	}
}

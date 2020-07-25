<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Visitors_m', 'visitors');
	}

	public function index(){
		$data['title'] = 'Selamat Datang';
		$data['statistics'] = $this->visitors->get_statistics();

		$this->template->load('templates/template', 'home/index', $data);
	}
}

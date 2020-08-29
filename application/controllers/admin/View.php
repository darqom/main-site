<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Menu_m', 'menu');
	}

	public function middleware(){
		return ['admin'];
	}

	public function menu(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Manajemen Menu';
		$data['menus'] = $this->menu->get();
		$middleware->generate_view('view/menu', $data);
	}

	public function coba(){

	}
}

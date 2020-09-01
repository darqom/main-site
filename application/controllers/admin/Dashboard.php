<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Dashboard_m', 'dashboard');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Dashboard';
		$data['statistics'] = $this->dashboard->get_statistics();
		$middleware->generate_view('dashboard/index', $data);
	}
}

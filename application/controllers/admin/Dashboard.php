<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Dashboard_m', 'dashboard');
		$this->load->model('Visitors_m', 'visitor');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];

		$data = [
			'title' => 'Dashboard',
			'statistics' => $this->dashboard->get_statistics(),
			'hStatistics' => array_reverse($this->visitor->hits_per_month(6)),
			'vStatistics' => array_reverse($this->visitor->visitors_per_month(6)),
		];
		
		$middleware->generate_view('dashboard/index', $data);
	}
}

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

		$data['title'] = 'Dashboard';
		$data['statistics'] = $this->dashboard->get_statistics();
		$data['hStatistics'] = array_reverse($this->visitor->hits_per_month(6));
		$data['vStatistics'] = array_reverse($this->visitor->visitors_per_month(6));
		$middleware->generate_view('dashboard/index', $data);
	}

	public function test(){
		$this->load->helper('facebook');
		$facebook = new Facebook_helper;
		$data = [
			'link' => 'facebook.com',
			'message' => 'Test post'
		];

		$res = $facebook->post_fanspage($data);
		var_dump($res);
	}
}

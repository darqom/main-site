<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data = [
			'title' => 'Login'
		];

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/login');
		$this->load->view('admin/templates/footer');
	}

	public function check_login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == false){
			echo json_encode([
				'status' => 'error',
				'errors' => [
					[
						'name' => 'username',
						'msg' => form_error('username')
					],
					[
						'name' => 'password',
						'msg' => form_error('password')
					]
				]
			]);
		}
	}
}

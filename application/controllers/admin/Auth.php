<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Auth_m', 'auth');
	}

	public function index(){
		redirect_login();
		$data = [
			'title' => 'Login'
		];

		$this->template->load('panel/template', 'panel/auth/login', $data);
	}

	public function check_login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == false){
			$data = [
				'status' => 'validate',
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
			];
		}else{
			$res = $this->auth->do_login();
			
			$data = [
				'status' => ($res['status'] == false) ? 'error' : 'success',
				'msg' => $res['msg']
			];
		}

		echo json_encode($data);
	}

	public function logout(){
		$this->session->unset_userdata('user');
		redirect('admin/auth');
	}
}

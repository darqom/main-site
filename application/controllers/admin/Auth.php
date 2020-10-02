<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Auth_m', 'auth');
		$this->load->model('Mail_m', 'mail');
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

	public function forgot(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('username', 'Username', 'required');
			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'error',
					'msg' => form_error('username')
				]);
			}else{
				$res = $this->auth->forgot();
				echo json_encode([
					'status' => $res['status'] ? 'success' : 'error',
					'msg' => $res['msg']
				]);
			}
		}else{
			$data = [
				'title' => 'Lupa Kata Sandi'
			];
			$this->template->load('panel/template', 'panel/auth/forgot', $data);
		}
	}

	public function reset(){
		$reset = $this->auth->reset();
		if($reset['status'] == true){
			if($this->form_validation->run('reset_pass') == false){
				$data = [
					'title' => 'Lupa Kata Sandi'
				];
				$this->template->load('panel/template', 'panel/auth/reset', $data);
			}else{
				$this->auth->do_reset($reset['email']);
				$this->session->set_flashdata('msg', ['class' => 'success', 'msg' => 'Password berhasil direset, silahkan login']);
				redirect('admin/auth');
			}
		}else{
			$this->session->set_flashdata('msg', ['class' => 'danger', 'msg' => $reset['msg']]);
			redirect('admin/auth/forgot');
		}
	}
}

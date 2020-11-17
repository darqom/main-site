<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Profile_m', 'profile');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Profil Pengguna';
		$middleware->generate_view('profile/index', $data);
	}

	public function save(){
		$user = $this->middlewares['admin']->get_user();

		if($this->input->is_ajax_request()){
			if(!$this->form_validation->run('save_profile')){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'fullname', 'msg' => form_error('fullname')],
						['name' => 'email', 'msg' => form_error('email')],
						['name' => 'gender', 'msg' => form_error('gender')]
					]
				]);
			}else{
				$res = $this->profile->save($user);
				$user = $this->middlewares['admin']->get_user();
				echo json_encode([
					'status' => 'success',
					'msg' => 'Berhasil disimpan',
					'user' => [
						'fullname' => $user['fullname'],
						'image' => $user['image'],
						'bio' => $user['bio']
					]
				]);
			}
		}
	}

	public function save_password(){
		$user = $this->middlewares['admin']->get_user();
		if($this->input->is_ajax_request()){
			if(!$this->form_validation->run('save_profile_pass')){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'old-pass', 'msg' => form_error('old-pass')],
						['name' => 'new-pass', 'msg' => form_error('new-pass')],
						['name' => 'confirm-pass', 'msg' => form_error('confirm-pass')]
					]
				]);
			}else{
				$res = $this->profile->save_password($user);
				echo json_encode([
					'status' => $res['status'] ? 'success' : 'error',
					'msg' => $res['msg']
				]);
			}
		}
	}
}

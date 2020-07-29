<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Institute extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Institute_m', 'institute');
		$this->load->model('Options_m', 'options');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];
		$middleware->allowed_role('1');

		$data['title'] = 'Info Sekolah';
		$data['options'] = $this->options->get();
		$middleware->generate_view('institute/index', $data);
	}

	public function save(){
		if($this->input->is_ajax_request()){
			if($this->form_validation->run('save_insitute') == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'description', 'msg' => form_error('description')],
						['name' => 'phone', 'msg' => form_error('phone')],
						['name' => 'email', 'msg' => form_error('email')],
						['name' => 'address', 'msg' => form_error('address')],
						['name' => 'youtube-embed', 'msg' => form_error('youtube-embed')],
						['name' => 'facebook', 'msg' => form_error('facebook')],
						['name' => 'facebook-name', 'msg' => form_error('facebook-name')],
						['name' => 'youtube', 'msg' => form_error('youtube')],
						['name' => 'youtube-name', 'msg' => form_error('youtube-name')],
						['name' => 'instagram', 'msg' => form_error('instagram')],
						['name' => 'instagram-name', 'msg' => form_error('instagram-name')],
					]
				]);
			}else{
				$res = $this->institute->save();
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function test(){
		var_dump($this->options->get());
	}
}

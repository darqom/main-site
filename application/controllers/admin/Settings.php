<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->middlewares['admin']->allowed_role('1');
		$this->load->model('Admin/Settings_m', 'settings');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Pengaturan';
		$middleware->generate_view('settings/index', $data);
	}

	public function general(){
		$middleware = $this->middlewares['admin'];
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('site-title', 'Judul Situs', 'required');

			if(!$this->form_validation->run()){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						[
							'name' => 'site-title',
							'msg' => form_error('site-title')
						]
					]
				]);
			}else{
				$res = $this->settings->save_general();
				
				echo json_encode([
					'status' => $res['status'] ? 'success' : 'error',
					'msg' => $res['msg']
				]);
			}
		}else{
			$data['title'] = 'Pengaturan Umum';
			$middleware->generate_view('settings/general', $data);
		}
	}

	public function smtp(){
		if($this->input->is_ajax_request()){
			if(!$this->form_validation->run('save_smtp')){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'smtp-host', 'msg' => form_error('smtp-host')],
						['name' => 'smtp-port', 'msg' => form_error('smtp-port')],
						['name' => 'smtp-username', 'msg' => form_error('smtp-username')],
						['name' => 'smtp-name', 'msg' => form_error('smtp-name')]
					]
				]);
			}else{
				$res = $this->settings->save_smtp();

				echo json_encode([
					'status' => $res['status'] ? 'success' : 'error',
					'msg' => $res['msg']
				]);
			}
		}else{
			$middleware = $this->middlewares['admin'];
			$data['title'] = 'Pengaturan SMTP';
			$middleware->generate_view('settings/smtp', $data);
		}
	}

	public function facebook(){
		$middleware = $this->middlewares['admin'];

		if($this->input->is_ajax_request()){
			if(!$this->form_validation->run('save_facebook')){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'fb-app-id', 'msg' => form_error('fb-app-id')],
						['name' => 'fb-app-secret', 'msg' => form_error('fb-app-secret')]
					]
				]);
			}else{
				$res = $this->settings->save_facebook();
				
				echo json_encode([
					'status' => $res['status'] ? 'success' : 'error',
					'msg' => $res['msg']
				]);
			}

		}else{
			$data = [
				'title' => 'Pengaturan Bot Facebook'
			];

			$middleware->generate_view('settings/facebook', $data);
		}
	}
}

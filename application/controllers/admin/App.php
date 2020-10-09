<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->middlewares['admin']->allowed_role('1');
		$this->load->model('Admin/App_m', 'app');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function settings(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Pengaturan';
		$middleware->generate_view('app/settings', $data);
	}

	public function save_smtp(){
		if($this->input->is_ajax_request()){
			if($this->form_validation->run('save_smtp') == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						[
							'name' => 'smtp-host',
							'msg' => form_error('smtp-host')
						],
						[
							'name' => 'smtp-port',
							'msg' => form_error('smtp-port')
						],
						[
							'name' => 'smtp-username',
							'msg' => form_error('smtp-username')
						],
						[
							'name' => 'smtp-name',
							'msg' => form_error('smtp-name')
						]
					]
				]);
			}else{
				$res = $this->app->save_smtp();

				echo json_encode([
					'status' => $res['status'] ? 'success' : 'error',
					'msg' => $res['msg']
				]);
			}
		}else{
			redirect('admin/app/settings');
		}
	}
}

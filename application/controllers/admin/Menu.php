<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Menu_m', 'menu');
	}

	public function get_menu(){
		if($this->input->is_ajax_request()){
			$id = $this->input->post('id', true);
			$menu = $this->menu->get($id);

			echo json_encode($menu);
		}
	}

	public function add_menu(){
		if($this->form_validation->run('add_menu') == false){
			echo json_encode([
				'status' => 'validate',
				'errors' => [
					['name' => 'label', 'msg' => form_error('label')],
					['name' => 'link', 'msg' => form_error('link')]
				]
			]);
		}else{
			$res = $this->menu->add();

			echo json_encode([
				'status' => ($res['status'] == false) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}

	public function edit_menu(){
		if($this->input->is_ajax_request()){
			if($this->form_validation->run('add_menu') == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'edit-label', 'msg' => form_error('label')],
						['name' => 'edit-link', 'msg' => form_error('link')]
					]
				]);
			}else{
				$res = $this->menu->edit();

				echo json_encode([
					'status' => ($res['status'] == false) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}
}

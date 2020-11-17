<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Pages_m', 'pages');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Semua Halaman';
		$middleware->generate_view('pages/index', $data);
	}

	public function add(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = "Tambah Halaman";
		$middleware->generate_view('pages/add', $data);
	}

	public function edit($id = null){
		if(is_null($id)) redirect('admin/pages');
		$page = $this->pages->get($id);
		if(is_null($page)) redirect('admin/pages');

		$middleware = $this->middlewares['admin'];

		if($this->input->is_ajax_request()){
			if($this->form_validation->run('edit_page') == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'title', 'msg' => form_error('title')],
						['name' => 'content', 'msg' => form_error('content')]
					]
				]);
			}else{
				$res = $this->pages->edit($id);

				echo json_encode([
					'status' => ($res['status'] == false) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}else{
			$data['title'] = 'Edit Halaman';
			$data['page'] = $page;

			$middleware->generate_view('pages/edit', $data);
		}
	}

	public function save(){
		if($this->input->is_ajax_request()){
			if(!$this->form_validation->run('save_page')){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'title', 'msg' => form_error('title')],
						['name' => 'content', 'msg' => form_error('content')]
					]
				]);
			}else{
				$res = $this->pages->add();

				echo json_encode([
					'status' => ($res['status'] == false) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function json(){
		$this->load->library('Datatables', 'datatables');
		echo $this->datatables->table('pages')->draw();
	}

	public function delete(){
		if($this->input->is_ajax_request()){
			$id = intval($this->input->post('id', true));

			$res = $this->pages->delete($id);
			echo json_encode([
				'status' => ($res['status'] == false) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}
}

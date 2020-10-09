<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->middlewares['admin']->allowed_role('1');
		$this->load->model('Admin/Users_m', 'users');
		$this->load->library('Datatables', 'datatables');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];
		$middleware->allowed_role('1');

		$data['title'] = "Daftar Pengelola";
		$middleware->generate_view('users/index', $data);
	}

	public function users_json(){
		$this->middlewares['admin']->allowed_role('1');

		$this->datatables->table('users');
		echo $this->datatables->draw();
	}

	public function add(){
		if(isset($_POST['username'])){
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|is_unique[users.username]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required|min_length[4]');
			$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
			$this->form_validation->set_rules('role', 'Role', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'username', 'msg' => form_error('username')],
						['name' => 'email', 'msg' => form_error('email')],
						['name' => 'fullname', 'msg' => form_error('fullname')],
						['name' => 'gender', 'msg' => form_error('gender')],
						['name' => 'role', 'msg' => form_error('role')]
					]
				]);
			}else{
				$res = $this->users->add();
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function delete(){
		if(isset($_POST['username'])){
			$username = htmlspecialchars($this->input->post('username', true));
			$res = $this->users->delete($username);
			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}
}

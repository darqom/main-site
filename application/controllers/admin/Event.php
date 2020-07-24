<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('Datatables', 'datatables');
		$this->load->model('Admin/Event_m', 'event');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Kegiatan';
		$middleware->generate_view('event/index', $data);
	}

	public function event_json(){
		if(count($_POST) > 0){
			echo $this->datatables->table('events')->draw();
		}
	}

	public function get_event(){
		if(isset($_POST['id'])){
			$id = htmlspecialchars($this->input->post('id', true));
			$res = $this->event->get_event($id);
			
			if(!$res['status']){
				echo json_encode([
					'status' => 'error',
					'msg' => $res['msg']
				]);
			}else{
				echo json_encode([
					'status' => 'success',
					'data' => $res['data']
				]);
			}
		}
	}

	public function add_event(){
		if(isset($_POST['title'])){
			$this->form_validation->set_rules('title', 'Judul', 'required');
			$this->form_validation->set_rules('description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('date', 'Tanggal', 'required');
			$this->form_validation->set_rules('time', 'Waktu Mulai', 'required');
			$this->form_validation->set_rules('time2', 'Waktu Selesai', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'title', 'msg' => form_error('title')],
						['name' => 'description', 'msg' => form_error('description')],
						['name' => 'date', 'msg' => form_error('date')],
						['name' => 'time', 'msg' => form_error('time')],
						['name' => 'time2', 'msg' => form_error('time2')],
					]
				]);
			}else{
				$res = $this->event->add_event();
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function edit_event(){
		if(isset($_POST['title'])){
			$this->form_validation->set_rules('id', 'ID', 'required|numeric');
			$this->form_validation->set_rules('title', 'Judul', 'required');
			$this->form_validation->set_rules('description', 'Deskripsi', 'required');
			$this->form_validation->set_rules('date', 'Tanggal', 'required');
			$this->form_validation->set_rules('time', 'Waktu Mulai', 'required');
			$this->form_validation->set_rules('time2', 'Waktu Selesai', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'edit-title', 'msg' => form_error('title')],
						['name' => 'edit-description', 'msg' => form_error('description')],
						['name' => 'edit-date', 'msg' => form_error('date')],
						['name' => 'edit-time', 'msg' => form_error('time')],
						['name' => 'edit-time2', 'msg' => form_error('time2')],
					]
				]);
			}else{
				$res = $this->event->edit_event();
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function del_event(){
		if(isset($_POST['id'])){
			$id = htmlspecialchars($this->input->post('id', true));

			$res = $this->event->del_event($id);
			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}

	public function announces(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Pengumuman';
		$middleware->generate_view('event/announces', $data);
	}

	public function get_announce(){
		if(isset($_POST['id'])){
			$id = htmlspecialchars($this->input->post('id', true));
			$res = $this->event->get_announce($id);
			
			if(!$res['status']){
				echo json_encode([
					'status' => 'error',
					'msg' => $res['msg']
				]);
			}else{
				echo json_encode([
					'status' => 'success',
					'data' => $res['data']
				]);
			}
		}
	}

	public function announces_json(){
		if(count($_POST) > 0){
			echo $this->datatables->table('announces')->draw();
		}
	}

	public function add_announce(){
		if(isset($_POST['title'])){
			$this->form_validation->set_rules('title', 'Judul', 'required');
			$this->form_validation->set_rules('content', 'Keterangan', 'required');
			$this->form_validation->set_rules('date', 'Tanggal', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'title', 'msg' => form_error('title')],
						['name' => 'content', 'msg' => form_error('content')],
						['name' => 'date', 'msg' => form_error('date')]
					]
				]);
			}else{
				$res = $this->event->add_announce();
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function edit_announce(){
		if(isset($_POST['title'])){
			$this->form_validation->set_rules('id', 'ID', 'required|numeric');
			$this->form_validation->set_rules('title', 'Judul', 'required');
			$this->form_validation->set_rules('content', 'Keterangan', 'required');
			$this->form_validation->set_rules('date', 'Tanggal', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'edit-title', 'msg' => form_error('title')],
						['name' => 'edit-content', 'msg' => form_error('content')],
						['name' => 'edit-date', 'msg' => form_error('date')]
					]
				]);
			}else{
				$res = $this->event->edit_announce();
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function del_announce(){
		if(isset($_POST['id'])){
			$id = htmlspecialchars($this->input->post('id', true));

			$res = $this->event->del_announce($id);
			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}
}

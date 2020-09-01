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

	public function extra(){
		$middleware = $this->middlewares['admin'];
		$middleware->allowed_role('1');

		$data['title'] = 'Ekstrakulikuler';
		$middleware->generate_view('institute/extra', $data);
	}

	public function extra_json(){
		if($this->input->is_ajax_request()){
			$this->load->library('Datatables', 'datatables');
			echo $this->datatables->table('extras')->draw();
		}
	}

	public function add_extra(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('name', 'Nama', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'name', 'msg' => form_error('name')]
					]
				]);
			}else{
				$res = $this->institute->add_extra();
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function del_extra(){
		if($this->input->is_ajax_request()){
			$id = htmlspecialchars($this->input->post('id', true));
			$res = $this->institute->del_extra($id);

			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}

	public function facility(){
		$middleware = $this->middlewares['admin'];
		$data['title'] = 'Fasilitasi Sekolah';
		$data['facilities'] = $this->institute->get_facilities();

		$middleware->generate_view('institute/facility', $data);
	}

	public function get_facility(){
		if($this->input->is_ajax_request()){
			$id = intval($this->input->post('id', true));
			$res = $this->institute->get_facilities($id);

			if(!is_null($res)){
				echo json_encode(['status' => 'success', 'facility' => $res]);
			}else{
				echo json_encode(['status' => 'error', 'msg' => 'Data tidak ditemukan']);
			}
		}
	}

	public function save_facility(){
		if($this->input->is_ajax_request()){
			$icons = [1, 2, 3];
			$id = intval($this->input->post('id', true));

			$this->form_validation->set_rules('name', 'Nama Fasilitas', 'required');
			if(in_array($id, $icons)) $this->form_validation->set_rules('icon', 'Ikon', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						['name' => 'name', 'msg' => form_error('name')],
						['name' => 'icon', 'msg' => form_error('icon')]
					]
				]);
			}else{
				$type = (in_array($id, $icons)) ? 'icon' : 'image';
				$res = $this->institute->save_facility($id, $type);
				$index = (in_array($id, $icons)) ? 0 : 1;
				echo json_encode([
					'status' => (!$res['status']) ? 'error' : 'success',
					'facilities' => $this->institute->get_facilities()[$index],
					'msg' => $res['msg']
				]);
			}
		}
	}

	public function facility_article($id = null){
		$middleware = $this->middlewares['admin'];
		$middleware->allowed_role('1');

		$facility = $this->institute->get_facilities($id);
		if(is_null($id) || is_null($facility)) redirect('admin/institute/facility');

		if($this->form_validation->run('facility_article') == false){
			$data['title'] = 'Artikel Fasilitas';
			$data['facility'] = $facility;
			$middleware->generate_view('institute/facility_art', $data);
		}else{
			$this->institute->save_facility_article($id);
			redirect('admin/institute/facility_article/'.$id);
		}
	}

	public function save(){
		$this->middlewares['admin']->allowed_role('1');

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

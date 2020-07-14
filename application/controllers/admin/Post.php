<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Post_m', 'post');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function add(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Tambah Pos';
		$middleware->generate_view('post/add', $data);
	}

	public function upload_image(){
		if(isset($_FILES['image']['name'])){
			$res = $this->post->upload_image();
			if(!$res['status']){
				echo json_encode([
					'status' => 'error',
					'msg' => $res['msg']
				]);
			}else{
				echo json_encode([
					'status' => 'success',
					'url' => $res['url']
				]);
			}
		}
	}

	function delete_image(){
		$src = $this->input->post('src', true);
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
			echo 'File Delete Successfully';
		}
	}
}

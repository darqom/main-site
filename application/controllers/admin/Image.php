<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Image_m', 'image');
	}

	public function upload(){
		if(isset($_FILES['image']['name'])){
			$path = $this->input->post('path', true);
			$res = $this->image->upload('image', $path);
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

	public function delete(){
		$src = $this->input->post('src', true);
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
			echo 'File Delete Successfully';
		}
	}
}

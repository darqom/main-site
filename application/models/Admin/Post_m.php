<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_m extends CI_Model{
	public function upload_image(){
		$config['upload_path'] = './assets/img/post';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('image')){
			return [
				'status' => false,
				'msg' => $this->upload->display_errors()
			];
		}else{
			$data = $this->upload->data();
		        //Compress Image
			$config['image_library']='gd2';
			$config['source_image']='./assets/img/post/'.$data['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= TRUE;
			$config['quality']= '60%';
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './assets/img/post/'.$data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return [
				'status' => true,
				'url' => base_url().'assets/img/post/'.$data['file_name']
			];
		}
	}
}

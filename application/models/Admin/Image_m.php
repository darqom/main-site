<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image_m extends CI_Model{
	public function upload($name, $path, $quality = 60){
		$config['upload_path'] = './assets/img/'.$path;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($name)){
			return [
				'status' => false,
				'msg' => $this->upload->display_errors()
			];
		}else{
			$data = $this->upload->data();
		        //Compress Image
			$config['image_library']='gd2';
			$config['source_image']="./assets/img/$path/".$data['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= TRUE;
			$config['quality']= "$quality%";
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= "./assets/img/$path/".$data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return [
				'status' => true,
				'url' => base_url()."assets/img/$path/".$data['file_name'],
				'name' => $data['file_name']
			];
		}
	}

	public function upload_multiple($images, $path, $quality = 60){
		$config['upload_path'] = './assets/img/'.$path;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['encrypt_name'] = true;
		$uploaded = [];
		$filename = [];

		foreach($images as $image){
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload($image)){
				$this->delete_multiple("./assets/img/$path/", $filename);
				return [
					'status' => false,
					'msg' => $this->upload->display_errors()
				];
			}else{
				$data = $this->upload->data();
				$uploaded[$image] = $data['file_name'];
				$filename[] = $data['file_name'];
				$config['image_library']='gd2';
				$config['source_image']="./assets/img/$path/".$data['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= TRUE;
				$config['quality']= "$quality%";
				$config['width']= 800;
				$config['height']= 800;
				$config['new_image']= "./assets/img/$path/".$data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
		}

		return [
			'status' => true,
			'images' => $uploaded,
		];
	}

	public function admin_upload($name, $path, $quality = 60){
		$config['upload_path'] = './assets/admin/img/'.$path;
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($name)){
			return [
				'status' => false,
				'msg' => $this->upload->display_errors()
			];
		}else{
			$data = $this->upload->data();
		        //Compress Image
			$config['image_library']='gd2';
			$config['source_image']="./assets/admin/img/$path/".$data['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= TRUE;
			$config['quality']= "$quality%";
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= "./assets/admin/img/$path/".$data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return [
				'status' => true,
				'url' => base_url()."assets/admin/img/$path/".$data['file_name'],
				'name' => $data['file_name']
			];
		}	
	}

	private function delete_multiple($path, $files){
		foreach($files as $file){
			@unlink($path.$file);
		}
		return true;
	}
}

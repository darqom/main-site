<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Institute_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->model('Options_m', 'options');
	}

	public function save(){
		$description = htmlspecialchars($this->input->post('description', true));
		$phone = htmlspecialchars($this->input->post('phone', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$address = htmlspecialchars($this->input->post('address', true));
		$youtubeEmbed = htmlspecialchars($this->input->post('youtube-embed', true));
		$facebook = htmlspecialchars($this->input->post('facebook', true));
		$facebookName = htmlspecialchars($this->input->post('facebook-name', true));
		$youtube = htmlspecialchars($this->input->post('youtube', true));
		$youtubeName = htmlspecialchars($this->input->post('youtube-name', true));
		$instagram = htmlspecialchars($this->input->post('instagram', true));
		$instagramName = htmlspecialchars($this->input->post('instagram-name', true));

		$data = [
			'description' => $description,
			'phone' => $phone,
			'email' => $email,
			'address' => $address,
			'youtube_embed' => $youtubeEmbed,
			'socmeds' => json_encode([
				'facebook' => [
					'id' => $facebook, 
					'name' => $facebookName
				],
				'youtube' => [
					'id' => $youtube,
					'name' => $youtubeName
				],
				'instagram' => [
					'id' => $instagram,
					'name' => $instagramName
				]
			])
		];

		$res = $this->options->save($data, 'school');
		return [
			'status' => $res,
			'msg' => ($res == true) ? 'Berhasil menyimpan data' : 'Gagal menyimpan data'
		];
	}

	public function get_extra($id = null){
		$this->db->from('extras');
		if(is_null($id)){
			return $this->db->get()->result_array();
		}else{
			$this->db->where('id', $id);
			return $this->db->get()->row_array();
		}
	}

	public function add_extra(){
		$name = htmlspecialchars($this->input->post('name', true));

		if($_FILES['image']['name'] != ''){
			$upload = $this->upload_image('image', 90);
			if($upload['status'] == true){
				$image = $upload['name'];
			}else{
				return ['status' => false, 'msg' => $upload['msg']];
			}
		}else{
			$image = 'noimage.png';
		}

		$data = [
			'extra_name' => $name,
			'extra_image' => $image
		];

		$this->db->insert('extras', $data);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Data berhasil ditambahkan'];
		}else{
			return ['status' => false, 'msg' => 'Data gagal ditambahkan'];
		}
	}

	public function del_extra($id){
		$image = $this->db->get_where('extras', ['id' => $id])->row_array()['extra_image'];
		if($image != 'noimage.png') @unlink('assets/img/extra/'.$image);
		$this->db->delete('extras', ['id' => $id]);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Data berhasil dihapus'];
		}else{
			return ['status' => false, 'msg' => 'Data gagal dihapus'];
		}
	}

	public function upload_image($name, $quality = 60){
		$config['upload_path'] = './assets/img/extra';
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
			$config['source_image']='./assets/img/extra/'.$data['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= TRUE;
			$config['quality']= "$quality%";
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './assets/img/extra/'.$data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return [
				'status' => true,
				'url' => base_url().'assets/img/extra/'.$data['file_name'],
				'name' => $data['file_name']
			];
		}
	}
}

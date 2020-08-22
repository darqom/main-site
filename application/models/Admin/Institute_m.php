<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Institute_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->model('Options_m', 'options');
		$this->load->model('Admin/Image_m', 'image');
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
			$upload = $this->image->upload('image', 'extra', 90);
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

	public function get_facilities($id = null){
		if(!is_null($id)){
			$this->db->where('id', $id);
			return $this->db->get('facilities')->row_array();
		}else{
			$res = $this->db->get('facilities')->result_array();
			return array_chunk($res, 3);
		}
	}

	public function save_facility($id, $type){
		$name = htmlspecialchars($this->input->post('name', true));
		$facility = $this->get_facilities($id);
		$data['facility_name'] = $name;

		if($type == 'icon'){
			$icon = htmlspecialchars($this->input->post('icon', true));
			$data['facility_icon'] = $icon;
		}else{
			if($_FILES['image']['name'] != ''){
				$up = $this->image->upload('image', 'facility', 80);
				if($up['status'] == false) return ['status' => false, 'msg' => $up['msg']];
				if($facility['facility_image'] != 'noimage.png') @unlink('./assets/img/facility/'.$facility['facility_image']);
				$data['facility_image'] = $up['name'];
			}else{
				$data['facility_image'] = $facility['facility_image'];
			}
		}

		$this->db->update('facilities', $data, ['id' => $id]);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Data berhasil diubah'];
		}else{
			return ['status' => false, 'msg' => 'Data gagal diubah'];
		}
	}
}

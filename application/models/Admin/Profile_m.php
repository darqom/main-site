<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Image_m', 'image');
	}

	public function save($user){
		$fullname = htmlspecialchars($this->input->post('fullname', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$gender = $this->input->post('gender', true);
		$bio = $this->input->post('bio');

		if($_FILES['image']['name'] != ''){
			$upload = $this->image->admin_upload('image', 'profile', 90);
			if($upload['status'] == true){
				if($user['image'] != 'default.png') @unlink('./assets/admin/img/profile/'.$user['image']);
				$image = $upload['name'];
			}else{
				return ['status' => false, 'msg' => $upload['msg']];
			}
		}else{
			$image = $user['image'];
		}

		$data = [
			'email' => $email,
			'fullname' => $fullname,
			'bio' => $bio,
			'image' => $image,
			'gender' => $gender
		];

		$this->db->update('users', $data, ['username' => $user['username']]);
		return true;
	}

	public function save_password($user){
		$old = htmlspecialchars($this->input->post('old-pass', true));
		$new = htmlspecialchars($this->input->post('new-pass', true));

		if(!password_verify($old, $user['password'])){
			return ['status' => false, 'msg' => 'Password yang anda masukkan salah'];
		}

		$data = [
			'password' => password_hash($new, PASSWORD_DEFAULT)
		];

		$this->db->update('users', $data, ['username' => $user['username']]);
		
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Password berhasil dirubah'];
		}else{
			return ['status' => false, 'msg' => 'Password gagal dirubah'];
		}
	}
}

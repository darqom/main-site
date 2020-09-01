<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_m extends CI_Model{
	public function add(){
		$username = htmlspecialchars($this->input->post('username', true));
		$email = htmlspecialchars($this->input->post('email', true));
		$fullname = htmlspecialchars($this->input->post('fullname', true));
		$gender = htmlspecialchars($this->input->post('gender', true));
		$role = htmlspecialchars($this->input->post('role', true));

		$data = [
			'username' => $username,
			'password' => password_hash('user1234', PASSWORD_DEFAULT),
			'email' => $email,
			'fullname' => $fullname,
			'image' => 'default.png',
			'gender' => $gender,
			'role' => $role
		];

		$this->db->insert('users', $data);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Pengguna berhasil ditambahkan'];
		}else{
			return ['status' => false, 'msg' => 'Pengguna gagal ditambahkan'];
		}
	}

	public function delete($username){
		$this->db->delete('users', ['username' => $username]);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Pengguna berhasil dihapus'];
		}else{
			return ['status' => false, 'msg' => 'Pengguna gagal dihapus'];
		}
	}
}

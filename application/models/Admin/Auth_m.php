<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model{
	public function do_login(){
		$username = htmlspecialchars($this->input->post('username', true));
		$password = htmlspecialchars($this->input->post('password', true));

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if(is_null($user)){
			return ['status' => false, 'msg' => 'Pengguna tidak ditemukan'];
		}else{
			if(password_verify($password, $user['password'])){
				$this->session->set_userdata('user', [
					'username' => $user['username'],
					'role' => $user['role']
				]);
				
				return ['status' => true, 'msg' => 'Berhasil login'];
			}else{
				return ['status' => false, 'msg' => 'Password salah'];
			}
		}
	}
}

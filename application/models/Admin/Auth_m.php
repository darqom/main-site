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

	public function forgot(){
		$username = htmlspecialchars($this->input->post('username', true));
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		if(is_null($user)){
			return [
				'status' => false,
				'msg' => 'Username tidak ditemukan'
			];
		}else{
			if($this->do_forgot($user['email'])){
				$email = $user['email'];
				return [
					'status' => true,
					'msg' => 'Tautan konfirmasi berhasil dikirimkan ke '. obfuscate_email($email)
				];
			}else{
				return [
					'status' => false,
					'msg' => 'Tauan konfirmasi gagal dikirimkan'
				];
			}
		}
	}

	public function reset(){
		$email = htmlspecialchars($this->input->get('email', true));
		$code = htmlspecialchars($this->input->get('code', true));

		$data = $this->db->get_where('reset_mail', ['email' => $email])->row_array();
		if(is_null($data)){
			return ['status' => false, 'msg' => 'Email atau Kode tidak valid'];
		}else{
			if($code == $data['code']){
				if(time() <= intval($data['expired'])){
					return ['status' => true, 'email' => $email];
				}else{
					$this->db->delete('reset_mail', ['email' => $email]);
					return ['status' => false, 'msg' => 'Kode sudah kedaluwarsa'];
				}
			}else{
				return ['status' => false, 'msg' => 'Kode konfirmasi tidak valid'];
			}
		}
	}

	public function do_reset($email){
		$password = htmlspecialchars($this->input->post('password', true));
		$password = password_hash($password, PASSWORD_DEFAULT);

		$this->db->update('users', ['password' => $password], ['email' => $email]);
		$this->db->delete('reset_mail', ['email' => $email]);
	}

	private function do_forgot($email){
		$this->load->model('Mail_m', 'mail_m');
		$this->load->helper('code_helper');

		$code = generate_code();
		$expired = time() + 3600;
		if($this->mail_m->send_reset($email, $code)){
			$this->db->delete('reset_mail', ['email' => $email]);
			$this->db->insert('reset_mail', ['email' => $email, 'code' => $code, 'expired' => $expired]);
			return true;
		};
	}
}

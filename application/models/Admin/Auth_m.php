<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function do_login(){
		$username = htmlspecialchars($this->input->post('username', true));
		$password = htmlspecialchars($this->input->post('password', true));

		$user = $this->users->get([
			'username' => $username
		]);

		if(is_null($user)){
			return [
				'status' => false,
				'msg' => 'Pengguna tidak ditemukan'
			];
		}else{
			if(password_verify($password, $user['password'])){
				$this->session->set_userdata('user', [
					'username' => $user['username'],
					'role' => $user['role']
				]);
				
				return [
					'status' => true,
					'msg' => 'Berhasil login'
				];
			}else{
				return [
					'status' => false,
					'msg' => 'Password salah'
				];
			}
		}
	}

	public function forgot(){
		$username = htmlspecialchars($this->input->post('username', true));

		$user = $this->users->get([
			'username' => $username
		]);

		if(is_null($user)){
			return [
				'status' => false,
				'msg' => 'Username tidak ditemukan'
			];
		}else{
			return $this->do_forgot($user['email']);
		}
	}

	public function reset(){
		$email = htmlspecialchars($this->input->get('email', true));
		$code = htmlspecialchars($this->input->get('code', true));

		$data = $this->mail->get_reset($email, $code);

		if(is_null($data)){
			return [
				'status' => false,
				'msg' => 'Email atau Kode tidak valid'
			];
		}else{
			if($code == $data['code']){
				if(time() <= intval($data['expired'])){
					return [
						'status' => true,
						'email' => $email
					];
				}else{
					$this->mail->delete_reset($email);
					return [
						'status' => false,
						'msg' => 'Kode sudah kedaluwarsa'
					];
				}
			}else{
				return [
					'status' => false,
					'msg' => 'Kode konfirmasi tidak valid'
				];
			}
		}
	}

	public function do_reset($email){
		$password = htmlspecialchars($this->input->post('password', true));

		$this->users->update_pass($email, $password);
		$this->mail->delete_reset($email);
	}

	private function do_forgot($email){
		$this->load->helper('code_helper');

		$code = generate_code();
		$forgot = $this->mail->send_reset($email, $code);

		if($forgot['status']){
			$this->mail->delete_reset($email);
			$this->mail->add_reset($email, $code);
		};

		return $forgot;
	}
}

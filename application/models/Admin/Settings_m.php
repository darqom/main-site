<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->model('Options_m', 'options');
	}

	public function save_smtp(){
		$host = $this->input->post('smtp-host', true);
		$port = $this->input->post('smtp-port', true);
		$username = $this->input->post('smtp-username', true);
		$password = $this->input->post('smtp-password', true);
		$name = $this->input->post('smtp-name', true);

		$data = [
			'host' => $host,
			'port' => $port,
			'username' => $username,
			'name' => $name
		];

		if(strlen($password) > 1) $data['password'] = encrypt($password);

		$res = $this->options->save($data, 'smtp');

		return [
			'status' => $res,
			'msg' => $res ? 'Konfigurasi SMTP berhasil disimpan' : 'Konfigurasi SMTP gagal disimpan'
		];
	}
}

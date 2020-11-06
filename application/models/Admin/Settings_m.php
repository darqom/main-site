<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->model('Options_m', 'options');
	}

	public function save_general(){
		$this->load->model('Admin/Image_m', 'image');
		$upload = [];

		$title = htmlspecialchars($this->input->post('site-title', true));
		if($_FILES['site_banner']['name'] != '') $upload[] = 'site_banner';
		if($_FILES['site_logo']['name'] != '') $upload[] = 'site_logo';
		if($_FILES['site_footer_logo']['name'] != '') $upload[] = 'site_footer_logo';

		if(!empty($upload)){
			$res = $this->image->upload_multiple($upload, 'site', 80);
			if(!$res['status']) return ['status' => false, 'msg' => $res['msg']];
			$data = $res['images'];

			foreach($res['images'] as $name => $value){
				@unlink("./assets/img/site/".get_option($name));
			}
		}

		$data['site_title'] = $title;
		$this->options->save($data);

		return ['status' => true, 'msg' => 'Pengaturan berhasil disimpan'];
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

	public function save_facebook(){
		$appID = $this->input->post('fb-app-id', true);
		$appSecret = $this->input->post('fb-app-secret', true);
		$token = $this->input->post('fb-page-token', true);
		$status = $this->input->post('status', true);

		$data = [
			'app_id' => encrypt($appID),
			'app_secret' => encrypt($appSecret),
			'bot_status' => is_null($status) ? 'off' : 'on'
		];

		if(strlen($token) > 0){
			$data['page_token'] = encrypt($token);
		}

		$res = $this->options->save($data, 'fb');

		return [
			'status' => $res,
			'msg' => $res ? 'Konfigurasi berhasil disimpan' : 'Konfigurasi gagal disimpan'
		];
	}
}

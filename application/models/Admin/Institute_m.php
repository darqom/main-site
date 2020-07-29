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
}

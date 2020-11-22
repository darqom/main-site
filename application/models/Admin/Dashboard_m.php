<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
class Dashboard_m extends CI_Model{
	public function get_statistics(){
		$this->load->model('Admin/Users_m', 'user');
		$this->load->model('Admin/Post_m', 'post');

		return [
			'admin' => count($this->user->get_admin()),
			'users' => count($this->user->get_user()),
			'posts' => $this->post->total()
		];
	}
}

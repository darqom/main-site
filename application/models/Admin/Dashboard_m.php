<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model{
	public function get_statistics(){
		return [
			'admin' => $this->db->get_where('users', ['role' => '1'])->num_rows(),
			'users' => $this->db->get_where('users', ['role' => '2'])->num_rows(),
		];
	}
}

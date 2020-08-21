<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_m extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_post($key, $value){
		return $this->db->get_where('posts', [$key => $value])->row_array();
	}
}

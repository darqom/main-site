<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_m extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_post($key, $value){
		return $this->db->get_where('posts', [$key => $value])->row_array();
	}

	public function get_category($key, $value){
		$this->db->where($key, $value);
		$this->db->where('is_deleted', '0');
		return $this->db->get('categories')->row_array();
	}

	public function get_by_category($category, $limit = 5, $start = 0){
		$this->db->like('post_categories', $category);
		$this->db->limit($limit, $start);
		return $this->db->get('posts')->result_array();
	}

	public function total_by_category($category){
		$this->db->like('post_categories', $category);
		return $this->db->get('posts')->num_rows();
	}
}

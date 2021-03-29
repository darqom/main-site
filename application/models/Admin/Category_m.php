<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model{
	private $table = 'categories';

	public function get(){
		return $this->db->get_where($this->table, [
			'is_deleted' => '0'
		])->result_array();
	}

	public function get_cat($key, $value){
		$this->db->where($key, $value);

		return $this->db->get($this->table)->row_array();
	}

	public function add(){
		$category = htmlspecialchars($this->input->post('category', true));
		$slug = url_title($category, 'dash', true);

		$data = [
			'category_name' => $category,
			'category_slug' => $slug
		];

		$this->db->insert('categories', $data);

		if($this->db->affected_rows() > 0){
			return [
				'status' => true,
				'data' => [
					'id' => $this->db->insert_id(),
					'name' => $category
				]
			];
		}else{
			return [
				'status' => true,
				'msg' => 'Kategori berhasil ditambahkan'
			];
		}
	}

	public function delete($id){
		if(is_null($id) || $id == '1'){
			return [
				'status' => false,
				'msg' => 'Gagal menghapus kategori'
			];
		}

		$data = ['is_deleted' => 1];

		$this->db->update('categories', $data, ['id' => $id]);

		if($this->db->affected_rows() > 0){
			return [
				'status' => true,
				'msg' => 'Berhasil menghapus kategori'
			];
		}else{
			return [
				'status' => false,
				'msg' => 'Gagal menghapus kategori'
			];
		}
	}
}

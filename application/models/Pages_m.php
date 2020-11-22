<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages_m extends CI_Model{
	public function get($id = null){
		if(is_null($id)){
			return $this->db->get('pages')->result_array();	
		}else{
			return $this->db->get_where('pages', [
				'id' => $id
			])->row_array();	
		}
	}

	public function get_page($key, $value){
		return $this->db->get_where('pages', [
			$key => $value
		])->row_array();
	}

	public function add(){
		$title = htmlspecialchars($this->input->post('title', true));
		$content = $this->input->post('content');
		$slug = url_title($title, 'dash', true);

		$data = [
			'page_title' => $title,
			'page_slug' => $slug,
			'page_content' => $content
		];

		$this->db->insert('pages', $data);

		if($this->db->affected_rows() > 0){
			return [
				'status' => true,
				'msg' => 'Berhasil menambahkan halaman'
			];
		}else{
			return [
				'status' => false,
				'msg' => 'Gagal menambahkan halaman'
			];
		}
	}

	public function edit($id){
		$title = htmlspecialchars($this->input->post('title', true));
		$content = $this->input->post('content');
		$slug = url_title($title, 'dash', true);

		$data = [
			'page_title' => $title,
			'page_slug' => $slug,
			'page_content' => $content
		];

		$this->db->update('pages', $data, ['id' => $id]);

		if($this->db->affected_rows() > 0){
			return [
				'status' => true,
				'msg' => 'Berhasil mengedit halaman'
			];
		}else{
			return [
				'status' => false,
				'msg' => 'Gagal mengedit halaman'
			];
		}
	}

	public function delete($id){
		$this->db->delete('pages', ['id' => $id]);

		if($this->db->affected_rows() > 0){
			return [
				'status' => true,
				'msg' => 'Berhasil menghapus halaman'
			];
		}else{
			return [
				'status' => false,
				'msg' => 'Gagal menghapus halaman'
			];
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_m extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get($id = null){
		$this->db->from('nav_menu');
		if(!is_null($id)) $this->db->where('id', $id);
		$this->db->where('is_main_menu', '0');
		$menu = $this->db->get()->result_array();
		if(count($menu) < 1) return null;
		$arr = [];
		foreach ($menu as $m) {
			$m['sub_menu'] = $this->get_sub($m['id']);
			$arr[] = $m;
		}

		return $arr;
	}

	public function get_sub($id = null){
		$this->db->from('nav_menu');
		if(!is_null($id)) $this->db->where('is_main_menu', $id);
		$subMenu = $this->db->get()->result_array();
		if(count($subMenu) < 1) return null;
		return $subMenu;
	}

	public function get_sub_menu($id = null){
		$subMenu = $this->db->get_where('nav_menu', ['id' => $id])->row_array();
		if(count($subMenu) < 1) return null;
		return $subMenu;
	}

	public function add(){
		$label = htmlspecialchars($this->input->post('label', true));
		$link = htmlspecialchars($this->input->post('link', true));
		$mainMenu = intval($this->input->post('menu', true));

		$data = [
			'label' => $label,
			'link' => $link,
			'is_main_menu' => $mainMenu
		];

		$this->db->insert('nav_menu', $data);

		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Menu berhasil ditambahkan'];
		}else{
			return ['status' => false, 'mg' => 'Menu gagal ditambahkan'];
		}
	}

	public function edit(){
		$id = intval($this->input->post('id', true));
		$label = htmlspecialchars($this->input->post('label', true));
		$link = htmlspecialchars($this->input->post('link', true));

		$data = [
			'label' => $label,
			'link' => $link
		];

		$this->db->update('nav_menu', $data, ['id' => $id]);

		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Menu berhasil diubah'];
		}else{
			return ['status' => false, 'msg' => 'Menu gagal diubah'];
		}
	}

	public function delete($id){
		$this->db->delete('nav_menu', ['is_main_menu' => $id]);
		$this->db->delete('nav_menu', ['id' => $id]);

		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Menu berhasil dihapus'];
		}else{
			return ['status' => false, 'msg' => 'Menu gagal dihapus'];
		}
	}
}

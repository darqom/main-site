<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Options_m extends CI_Model{
	public function save($options, $prefix = null){
		$prefix = (is_null($prefix)) ? '' : $prefix.'_';
		$data = [];
		foreach ($options as $name => $value) {
			$data[] = [
				'name' => $prefix.$name,
				'value' => $value
			];
		}
		
		$this->db->update_batch('options', $data, 'name');
		return ($this->db->affected_rows() > 0) ? true : false;
	}

	public function get($name = null){
		$this->db->from('options');
		if(!is_null($name)){
			$this->db->select('value');
			$this->db->where('name', $name);
			return $this->db->get()->row_array()['value'];
		}else{
			$this->db->select('name, value');
			$result = $this->db->get()->result_array();
			$data = [];
			foreach($result as $option){
				$data[$option['name']] = $option['value'];
			}
			return $data;
		}
	}
}

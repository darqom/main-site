<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facility_m extends CI_Model{
	public function get_facility($key, $value){
		return $this->db->get_where('facilities', [$key => $value])->row_array();
	}
}

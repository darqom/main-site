<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visitors_m extends CI_Model{
	public function insert(){
		$ip = $this->input->ip_address();
		$data = [
			'visitor_ip' => $ip,
			'visitor_date' => date('Y-m-d')
		];
		$visitor = $this->db->get_where('visitors', $data)->row_array();

		if(is_null($visitor)){
			$this->add($ip);
		}else{
			$this->update($ip, $visitor['visitor_hits'], $visitor['visitor_date']);
		}
	}

	public function get_statistics(){
		$time = time();
		$date = date('Y-m-d');
		$visitors = $this->db->get('visitors')->num_rows();
		$vToday = $this->db->get_where('visitors', ['visitor_date' => $date])->num_rows();
		$hits = $this->db->select('SUM(visitors.visitor_hits) as totals')->from('visitors')->get()->row_array();
		$hToday = $this->db->select('SUM(visitors.visitor_hits) as totals')->where('visitor_date', $date)->from('visitors')->get()->row_array();
		$vOnline = $this->db->get_where('visitors', ['visitor_online >' => $time - 300 , 'visitor_date' => $date])->num_rows();

		return [
			'total_visitors' => $visitors,
			'today_visitors' => $vToday,
			'total_hits' => $hits['totals'],
			'today_hits' => $hToday['totals'],
			'online_visitors' => $vOnline
		];
	}

	private function update($ip, $hits, $date){
		$data = [
			'visitor_hits' => $hits + 1,
			'visitor_online' => time()
		];
		$where = [
			'visitor_ip' => $ip,
			'visitor_date' => $date
		];

		$this->db->update('visitors', $data, $where);
	}

	private function add($ip){
		$data = [
			'visitor_ip' => $ip,
			'visitor_hits' => '1',
			'visitor_date' => date('Y-m-d'),
			'visitor_online' => time()
		];

		$this->db->insert('visitors', $data);
	}
}

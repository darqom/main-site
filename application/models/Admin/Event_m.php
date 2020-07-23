<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_m extends CI_Model{
	public function get_event($id){
		$event = $this->db->get_where('events', ['id' => $id])->row_array();
		if(is_null($event)){
			return ['status' => false, 'msg' => 'Tidak dapat menemukan event'];
		}else{
			$time = explode('-', $event['event_time']);
			$data = [
				'id' => $event['id'],
				'title' => $event['event_title'],
				'description' => $event['event_description'],
				'date' => $event['event_date'],
				'start_time' => $time[0],
				'end_time' => $time[1]
			];
			return ['status' => true, 'data' => $data];
		}
	}

	public function add_event(){
		$title = htmlspecialchars($this->input->post('title', true));
		$description = htmlspecialchars($this->input->post('description', true));
		$date = htmlspecialchars($this->input->post('date', true));
		$time = htmlspecialchars($this->input->post('time', true));
		$time2 = htmlspecialchars($this->input->post('time2', true));

		$data = [
			'event_title' => $title,
			'event_description' => $description,
			'event_date' => $date,
			'event_time' => "$time-$time2"
		];

		$this->db->insert('events', $data);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Kegiatan berhasil ditambahkan'];
		}else{
			return ['status' => false, 'msg' => 'Kegiatan gagal ditambahkan'];
		}
	}

	public function edit_event(){
		$id = intval($this->input->post('id', true));
		$title = htmlspecialchars($this->input->post('title', true));
		$description = htmlspecialchars($this->input->post('description', true));
		$date = htmlspecialchars($this->input->post('date', true));
		$time = htmlspecialchars($this->input->post('time', true));
		$time2 = htmlspecialchars($this->input->post('time2', true));

		$data = [
			'event_title' => $title,
			'event_description' => $description,
			'event_date' => $date,
			'event_time' => "$time-$time2"
		];

		$this->db->update('events', $data, ['id' => $id]);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Kegiatan berhasil diubah'];
		}else{
			return ['status' => false, 'msg' => 'Kegiatan gagal diubah'];
		}
	}

	public function del_event($id){
		$this->db->delete('events', ['id' => $id]);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Kegiatan berhasil dihapus'];
		}else{
			return ['status' => false, 'msg' => 'Kegiatan gagal dihapus'];
		}
	}
}

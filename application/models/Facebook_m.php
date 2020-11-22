<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facebook_m extends CI_Model{
	public function __construct(){
		$this->load->helper('facebook');
		$this->facebook = new Facebook_helper;
	}

	public function send($post, $id){
		if($this->check_post_avail($post)){

			$post = [
				'link' => base_url('post/'.$post['post_slug']),
				'message' => $post['post_title']
			];

			$send = $this->facebook->post_fanspage($post);

			if($send['status']){
				$this->db->insert('posts_facebook', [
					'post_id' => $id,
					'story_id' => $send['data']['id']
				]);
			}
		}
	}

	public function delete($pid){
		$story = $this->story($pid);

		if(!is_null($story)){
			$this->facebook->delete_fanspage($story['story_id']);
			$this->db->delete('posts_facebook', ['post_id' => $pid]);
		}

		return true;
	}

	public function edit_act($post, $id){
		if(!$this->check_post_avail($post)){
			$story = $this->story($id);

			if(!is_null($story)){
				$this->delete($id);
			}
		}else{
			$story = $this->story($id);

			if(is_null($story)){
				$this->send($post, $id);
			}
		}
	}

	private function check_post_avail($post){
		if($post['post_status'] == 'draft' || $post['post_visibility'] == 'private') return false;

		return true;
	}

	private function story($id){
		return $this->db->get_where('posts_facebook', [
			'post_id' => $id
		])->row_array();
	}
}

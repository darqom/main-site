<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_m extends CI_Model{
	public function get_post($id){
		return $this->db->get_where('posts', ['id' => $id])->row_array();
	}

	public function get_posts($limit = null){
		$this->db->from('posts');
		if(!is_null($limit)) $this->db->limit($limit);
		$this->db->order_by('id', 'DESC');
		$this->db->where(['post_status' => 'publish', 'post_visibility' => 'public']);
		return $this->db->get()->result_array();
	}

	public function get_categories(){
		return $this->db->get_where('categories', ['is_deleted' => '0'])->result_array();
	}

	public function add_category(){
		$category = htmlspecialchars($this->input->post('category', true));
		$slug = url_title($category, 'dash', true);

		$data = [
			'category_name' => $category,
			'category_slug' => $slug
		];
		$this->db->insert('categories', $data);

		if($this->db->affected_rows() > 0){
			return ['status' => true, 'data' => [
				'id' => $this->db->insert_id(),
				'name' => $category
			]];
		}else{
			return ['status' => true, 'msg' => 'Kategori berhasil ditambahkan'];
		}
	}

	public function del_category($id){
		if(is_null($id) || $id == '1'){
			return ['status' => false, 'msg' => 'Gagal menghapus kategori'];
		}

		$data = ['is_deleted' => 1];
		$this->db->update('categories', $data, ['id' => $id]);
		if($this->db->affected_rows() > 0){
			return ['status' => true, 'msg' => 'Berhasil menghapus kategori'];
		}else{
			return ['status' => false, 'msg' => 'Gagal menghapus kategori'];
		}
	}

	public function save(){
		$title = htmlspecialchars($this->input->post('title', true));
		$slug = url_title($title, 'dash', true);
		$content = $this->input->post('content');
		$status = htmlspecialchars($this->input->post('status', true));
		$access = htmlspecialchars($this->input->post('access', true));
		$comment = htmlspecialchars($this->input->post('comment', true));
		$categories = $this->input->post('categories');

		if($_FILES['cover']['name'] != ''){
			$upload = $this->upload_image('cover', 90);
			if($upload['status'] == true){
				$cover = $upload['name'];
			}else{
				return ['status' => false, 'msg' => $upload['msg']];
			}
		}else{
			$cover = null;
		}

		if(is_null($categories)){
			$categories = '1';
		}else{
			$categories = implode('+', $categories);
		}

		$data = [
			'post_author' => $this->session->userdata('user')['username'],
			'post_title' => $title,
			'post_slug' => $slug,
			'post_cover' => $cover,
			'post_content' => $content,
			'post_status' => $status,
			'post_visibility' => $access,
			'post_categories' => $categories,
			'comment_status' => $comment,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->insert('posts', $data);
		if($this->db->affected_rows() > 0){
			$this->send_to_facebook($data, $this->db->insert_id());
			return [
				'status' => true,
				'msg' => 'Post berhasil disimpan'
			];
		}else{
			return [
				'status' => false,
				'msg' => 'Post gagal disimpan'
			];
		}
	}

	public function edit($username){
		$id = intval($this->input->post('id', true));
		$post = $this->db->get_where('posts', ['id' => $id])->row_array();

		if(is_null($post) || $post['post_author'] != $username){
			return ['status' => false, 'msg' => 'Gagal mengedit pos'];
		}

		$title = htmlspecialchars($this->input->post('title', true));
		$content = $this->input->post('content');
		$status = htmlspecialchars($this->input->post('status', true));
		$access = htmlspecialchars($this->input->post('access', true));
		$comment = htmlspecialchars($this->input->post('comment', true));
		$categories = $this->input->post('categories');

		if($_FILES['cover']['name'] != ''){
			$upload = $this->upload_image('cover', 90);
			if($upload['status'] == true){
				if($post['post_cover'] != 'noimage.png') @unlink('./assets/img/post/'.$post['post_cover']);
				$cover = $upload['name'];
			}else{
				return ['status' => false, 'msg' => $upload['msg']];
			}
		}else{
			$cover = $post['post_cover'];
		}

		if(is_null($categories)){
			$categories = '1';
		}else{
			$categories = implode('+', $categories);
		}

		$data = [
			'post_title' => $title,
			'post_cover' => $cover,
			'post_content' => $content,
			'post_status' => $status,
			'post_visibility' => $access,
			'post_categories' => $categories,
			'comment_status' => $comment,
			'updated_at' => date('Y-m-d H:i:s')
		];

		$this->db->update('posts', $data, ['id' => $id]);
		if($this->db->affected_rows() > 0){
			return [
				'status' => true,
				'msg' => 'Perubahan berhasil disimpan'
			];
		}else{
			return [
				'status' => false,
				'msg' => 'Perubahan gagal disimpan'
			];
		}
	}

	public function del_post($id, $user){
		$post = $this->db->get_where('posts', ['id' => $id])->row_array();
		if(!is_null($post) || $post['post_author'] == $user['username'] || $user['role'] == '1'){
			if($post['post_cover'] != 'noimage.png') @unlink('./assets/img/post/'.$post['post_cover']);

			$this->delete_from_facebook($post);
			
			$this->db->delete('posts', ['id' => $id]);
			if($this->db->affected_rows() > 0){
				return [
					'status' => true,
					'msg' => 'Post berhasil dihapus'
				];
			}else{
				return [
					'status' => false,
					'msg' => 'Post gagal dihapus'
				];
			}
		}else{
			return [
				'status' => false,
				'msg' => 'Post gagal dihapus'
			];
		}
	}

	public function upload_image($name, $quality = 60){
		$config['upload_path'] = './assets/img/post';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);
		if(!$this->upload->do_upload($name)){
			return [
				'status' => false,
				'msg' => $this->upload->display_errors()
			];
		}else{
			$data = $this->upload->data();
		        //Compress Image
			$config['image_library']='gd2';
			$config['source_image']='./assets/img/post/'.$data['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= TRUE;
			$config['quality']= "$quality%";
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './assets/img/post/'.$data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return [
				'status' => true,
				'url' => base_url().'assets/img/post/'.$data['file_name'],
				'name' => $data['file_name']
			];
		}
	}

	private function send_to_facebook($data, $id){
		$this->load->helper('facebook');
		$facebook = new Facebook_helper;
		if($this->check_post_avail($data)){

			$post = [
				'link' => base_url('post/'.$data['post_slug']),
				'message' => $data['post_title']
			];

			$send = $facebook->post_fanspage($post);

			if($send['status']){
				$this->db->insert('posts_facebook', [
					'post_id' => $id,
					'story_id' => $send['data']['id']
				]);
			}
		}
	}

	private function check_post_avail($data){
		if($data['post_status'] == 'draft' || $data['post_visibility'] == 'private') return false;

		return true;
	}

	private function delete_from_facebook($post){
		$this->load->helper('facebook');

		$facebook = new Facebook_helper;
		$story = $this->db->get_where('posts_facebook', [
			'post_id' => $post['id']
		])->row_array();

		if(!is_null($story)){
			$facebook->delete_fanspage($story['story_id']);
		}

		return true;
	}
}

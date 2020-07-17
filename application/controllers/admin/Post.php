<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Post_m', 'post');
		$this->load->library('Datatables', 'datatables');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function add(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Tambah Pos';
		$data['categories'] = $this->post->get_categories();
		$middleware->generate_view('post/add', $data);
	}

	public function categories(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Kategori Pos';
		$middleware->generate_view('post/categories', $data);
	}

	public function categories_json(){
		$this->datatables->table('categories')->select('id, category_name as name')->where(['id !=' => '1', 'is_deleted' => '0']);
		echo $this->datatables->draw();
	}

	public function save(){
		$this->form_validation->set_rules('title', 'Judul', 'required|is_unique[posts.post_title]');
		$this->form_validation->set_rules('content', 'Konten', 'required|min_length[12]');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('access', 'Akses', 'required');
		$this->form_validation->set_rules('comment', 'Komentar', 'required');

		if($this->form_validation->run() == false){
			echo json_encode([
				'status' => 'validate',
				'errors' => [
					['name' => 'title', 'msg' => form_error('title')],
					['name' => 'content', 'msg' => form_error('content')],
					['name' => 'status', 'msg' => form_error('status')],
					['name' => 'access', 'msg' => form_error('access')],
					['name' => 'comment', 'msg' => form_error('comment')]
				]
			]);
		}else{
			$res = $this->post->save();
			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}

	public function add_category(){
		if(!is_null($this->input->post('category'))){
			$this->form_validation->set_rules('category', 'Kategori', 'required');

			if($this->form_validation->run() == false){
				echo json_encode([
					'status' => 'validate',
					'errors' => [
						[
							'name' => 'category',
							'msg' => form_error('category')
						]
					]
				]);
			}else{
				$res = $this->post->add_category();

				if(!$res['status']){
					echo json_encode([
						'status' => 'error',
						'msg' => $res['msg']
					]);
				}else{
					echo json_encode([
						'status' => 'success',
						'data' => $res['data']
					]);
				}
			}
		}
	}

	public function del_category(){
		if(isset($_POST)){
			$id = htmlspecialchars($this->input->post('id', true));
			$res = $this->post->del_category($id);

			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}

	public function upload_image(){
		if(isset($_FILES['image']['name'])){
			$res = $this->post->upload_image('image');
			if(!$res['status']){
				echo json_encode([
					'status' => 'error',
					'msg' => $res['msg']
				]);
			}else{
				echo json_encode([
					'status' => 'success',
					'url' => $res['url']
				]);
			}
		}
	}

	public function delete_image(){
		$src = $this->input->post('src', true);
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
			echo 'File Delete Successfully';
		}
	}
}

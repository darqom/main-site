<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin/Post_m', 'post');
		$this->load->model('Admin/Category_m', 'category');
		$this->load->library('Datatables', 'datatables');
	}

	protected function middleware(){
		return ['admin'];
	}

	public function index(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Semua Pos';
		$middleware->generate_view('post/index', $data);
	}

	public function add(){
		$middleware = $this->middlewares['admin'];

		$data = [
			'title' => 'Tambah Post',
			'categories' => $this->category->get()
		];

		$middleware->generate_view('post/add', $data);
	}

	public function edit($id = null){
		if(is_null($id)) redirect('admin/post');
		$middleware = $this->middlewares['admin'];

		$post = $this->post->get_post($id);
		if(!is_null($post)){
			$data = [
				'title' => 'Edit Post',
				'post' => $post,
				'categories' => $this->category->get()
			];

			$middleware->generate_view('post/edit', $data);
		}else{
			redirect('admin/post');
		}
	}

	public function categories(){
		$middleware = $this->middlewares['admin'];

		$data['title'] = 'Kategori Pos';
		$middleware->generate_view('post/categories', $data);
	}

	public function posts_json(){
		$this->datatables->table('posts');
		$this->datatables->select('id, post_title, post_author, post_status, created_at, updated_at');

		header('Content-Type: application/json');
		echo $this->datatables->draw();
	}

	public function edit_post(){
		$user = $this->middlewares['admin']->get_user();

		if(!$this->form_validation->run('edit_post')){
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
			$res = $this->post->edit($user['username']);
			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}

	public function del_post(){
		$middleware = $this->middlewares['admin'];

		if(isset($_POST)){
			$id = htmlspecialchars($this->input->post('id', true));
			$user = $middleware->get_user();

			$res = $this->post->del_post($id, $user);
 
			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}

	public function categories_json(){
		$this->datatables->table('categories')->select('id, category_name as name')->where(['id !=' => '1', 'is_deleted' => '0']);
		echo $this->datatables->draw();
	}

	public function save(){
		
		if(!$this->form_validation->run('save_post')){
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
				$res = $this->category->add();

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
			$res = $this->category->delete($id);

			echo json_encode([
				'status' => (!$res['status']) ? 'error' : 'success',
				'msg' => $res['msg']
			]);
		}
	}
}

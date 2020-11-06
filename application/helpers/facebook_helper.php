<?php
require APPPATH . 'third_party/Facebook/autoload.php';

class Facebook_helper{
	public function __construct(){
		$this->init();
	}

	private function init(){
		$appID = get_option('fb_app_id');
		$appSecret = get_option('fb_app_secret');

		$this->facebook = new Facebook\Facebook([
			'app_id' => decrypt($appID),
			'app_secret' => decrypt($appSecret)
		]);
	}

	public function post_fanspage($data){
		$token = decrypt(get_option('fb_page_token'));
		$response = $this->facebook->post('/me/feed', $data, $token);
		
		return $response;
	}
}

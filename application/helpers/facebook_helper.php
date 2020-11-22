<?php
require APPPATH . 'third_party/Facebook/autoload.php';

class Facebook_helper{
	public function __construct(){
		$this->init();
		$this->status = get_option('fb_bot_status');
	}

	private function init(){
		$appID = get_option('fb_app_id');
		$appSecret = get_option('fb_app_secret');

		$this->facebook = new Facebook\Facebook([
			'app_id' => decrypt($appID),
			'app_secret' => decrypt($appSecret)
		]);
	}

	public function get_status(){
		return get_option('fb_bot_status');
	}

	public function post_fanspage($data){
		$token = decrypt(get_option('fb_page_token'));

		if($this->status == 'on'){
			try{
				$response = $this->facebook->post('/me/feed', $data, $token)->getDecodedBody();
				return ['status' => true, 'data' => $response]	;
			}catch(Exception $e){
				return ['status' => false, 'msg' => $e->getMessage()];
			}
		}else{
			return ['status' => false, 'msg' => 'Bot tidak diaktifkan'];
		}
		
	}

	public function delete_fanspage($id){
		$token = decrypt(get_option('fb_page_token'));
		$url = "https://graph.facebook.com/$id?access_token=$token";

		$res = $this->curl_delete($url);
		return $res;
	}

	private function curl_delete($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		curl_close($ch);

		return json_decode($result, true);
	}
}

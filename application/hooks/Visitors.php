<?php
class Visitors{
	private $ci;

	public function __construct(){
		$this->ci = get_instance();
		$this->ci->load->model('Visitors_m', 'visitor');
	}

	public function process(){
		if($this->ci->uri->segment(1) != 'admin'){
			$this->ci->visitor->insert();
		}
	}
}

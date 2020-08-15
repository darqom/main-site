<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Visitors_m', 'visitors');
		$this->load->model('Admin/Post_m', 'post');
		$this->load->model('Admin/Event_m', 'event');
		$this->load->model('Admin/Institute_m', 'institute');
	}

	public function index(){
		$data['title'] = 'Selamat Datang';
		$data['statistics'] = $this->visitors->get_statistics();
		$data['posts'] = $this->post->get_posts(3);
		$data['announces'] = $this->event->get_announces(3);
		$data['events'] = $this->event->get_events(3);
		$data['extrasGroup'] = array_chunk($this->institute->get_extra(), 4);
		$data['facilities'] = $this->institute->get_facilities();
		
		$this->template->load('templates/template', 'home/index', $data);
	}
}

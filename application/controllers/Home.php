<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Visitors_m', 'visitors');
		$this->load->model('Post_m', 'post');
		$this->load->model('Admin/Event_m', 'event');
		$this->load->model('Admin/Institute_m', 'institute');
	}

	public function index(){

		$data = [
			'title' => 'Selamat Datang',
			'statistics' => $this->visitors->get_statistics(),
			'posts' => $this->post->get_latest(3),
			'announces' => $this->event->get_announces(4),
			'events' => $this->event->get_events(3),
			'extras' => $this->institute->get_extra(),
			'facilities' => $this->institute->get_facilities(),
		];
		
		$this->template->load('templates/template', 'home/index', $data);
	}
}

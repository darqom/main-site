<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facility extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Facility_m', 'facility');
	}

	public function read($slug = ''){
		$facility = $this->facility->get_facility('facility_slug', $slug);
		if(is_null($facility)) show_404();

		$data['facility'] = $facility;
		$data['title'] = $facility['facility_name'];
		$this->template->load('templates/template_article', 'facility/read', $data);
	}
}

<?php

class AdminMiddleware {
  protected $controller;
  protected $ci;
  private $session;
  public $user;
  public function __construct($controller, $ci)
  {
    $this->controller = $controller;
    $this->ci = $ci;
    $this->session = $ci->session;
    $this->user = $this->session->userdata('user');
  }

  public function run(){
    $this->check_session();
  }

  public function allowed_role($roles){
    $role = $this->user['role'];
    $roles = explode('|', $roles);
    if(!in_array($role, $roles)) redirect('admin/dashboard');
  }

  public function generate_view($view, $data = [], $allow = false){
    $data['user'] = $this->get_user();
    $data['role'] = $this->user['role'];
    $data['aURL'] = $this->get_active_url();
    if($allow != false){
      $this->ci->template->load('panel/template_m', "$view", $data);
    }else if($this->user['role'] == 1){
      $this->ci->template->load('panel/template_m', "panel/admin/$view", $data);
    }else{
      $this->ci->template->load('panel/template_m', "panel/user/$view", $data);
    }
  }

  public function get_user(){
    return $this->ci->db->get_where('users', ['username' => $this->user['username']])->row_array();
  }

  private function check_session(){
    if(is_null($this->user)) redirect('admin/auth');
  }

  private function get_active_url(){
    return $this->ci->uri->segment(2);
  }
}

<?php

class AdminAuthMiddleware {
    protected $controller;
    protected $ci;
    public $roles = array();
    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;
    }

    public function run(){
        $this->roles = array('somehting', 'view', 'edit');
    }
}

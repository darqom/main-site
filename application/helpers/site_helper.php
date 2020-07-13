<?php

function greet(){
	$time = intval(date('H'));
	
	if($time >= 10 && $time <= 13){
		return "Selamat Siang";
	}else if($time >= 13 && $time <= 17){
		return "Selamat Sore";
	}else if($time >= 17 || $time <= 4){
		return "Selamat Malam";
	}else{
		return "Selamat Pagi";
	}
}

function redirect_login(){
	$ci = &get_instance();
	$user = $ci->session->userdata('user');
	if(!is_null($user)) redirect('admin/dashboard');
}

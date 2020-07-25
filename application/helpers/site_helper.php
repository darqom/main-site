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

function indo_date($date, $sub = false){
	$date = explode(' ', $date)[0];
	$months = [
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	];

	$exploded = explode('-', $date);
	$month = $months[(int)$exploded[1]];
	if($sub) $month = substr($month, 0, $sub);
	return $exploded[2].' '.$month.' '.$exploded[0];
}

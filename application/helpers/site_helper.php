<?php

function encrypt($str){
	return openssl_encrypt($str, 'AES-128-ECB', 'darqom2020');
}

function decrypt($str){
	return openssl_decrypt($str, 'AES-128-ECB', 'darqom2020');
}

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

function time_elapsed($datetime, $full = false){
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);
	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;
	$string = [
		'y' => 'tahun',
		'm' => 'bulan',
		'd' => 'hari',
		'h' => 'jam',
		'i' => 'menit',
		's' => 'detik'
	];

	foreach($string as $k => &$v){
		if($diff->$k){
			$v = $diff->$k. ' ' .$v.($diff->$k > 1 ? '' : '');
		}else{
			unset($string[$k]);
		}
	}
	if(!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(',', $string). ' yang lalu' : 'Baru saja';
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

	$day = isset($exploded[2]) ? $exploded[2] : '';
	return trim($day.' '.$month.' '.$exploded[0]);
}

function get_option($name){
	$ci = &get_instance();
	$ci->db->from('options');
	$ci->db->select('value');
	$ci->db->where('name', $name);
	return $ci->db->get()->row_array()['value'];
}

function get_statistics($key = null){
	$ci = &get_instance();
	$time = time();
	$date = date('Y-m-d');
	$visitors = $ci->db->get('visitors')->num_rows();
	$vToday = $ci->db->get_where('visitors', ['visitor_date' => $date])->num_rows();
	$hits = $ci->db->select('SUM(visitors.visitor_hits) as totals')->from('visitors')->get()->row_array();
	$hToday = $ci->db->select('SUM(visitors.visitor_hits) as totals')->where('visitor_date', $date)->from('visitors')->get()->row_array();
	$vOnline = $ci->db->get_where('visitors', ['visitor_online >' => $time - 300 , 'visitor_date' => $date])->num_rows();

	$data = [
		'total_visitors' => $visitors,
		'today_visitors' => $vToday,
		'total_hits' => $hits['totals'],
		'today_hits' => $hToday['totals'],
		'online_visitors' => $vOnline
	];

	return (is_null($key)) ? $data : $data[$key];
}

function get_category($id){
	$ci = &get_instance();
	return $ci->db->get_where('categories', ['id' => $id])->row_array();
}

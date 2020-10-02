<?php
function generate_string($input, $length = 10) {
	$input_length = strlen($input);
	$random_string = '';
	for($i = 0; $i < $length; $i++) {
		$random_character = $input[mt_rand(0, $input_length - 1)];
		$random_string .= $random_character;
	}
	return $random_string;
}

function generate_code($len = 10){
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVSXYZ1234567890';
	return generate_string($chars, $len);
}

function obfuscate_email($email){
	$em   = explode("@",$email);
	$name = implode('@', array_slice($em, 0, count($em)-1));
	$len  = floor(strlen($name)/2);

	return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
}

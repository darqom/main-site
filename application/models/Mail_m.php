<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH.'third_party/PHPMailer/Exception.php';
require APPPATH.'third_party/PHPMailer/PHPMailer.php';
require APPPATH.'third_party/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail_m extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->model('Options_m', 'options');
		$this->load->helper('mail_helper');
		$this->mailer = new PHPMailer;
		$this->mail = new Mail_helper;
	}

	private function init(){
		$username = get_option('mail_username');
		$password = get_option('mail_password');
		$name = get_option('mail_name');

		$this->mailer->SMTPDebug = false;
		$this->mailer->IsHTML(true);
		$this->mailer->IsSMTP();
		$this->mailer->SMTPAuth = true;
		$this->mailer->SMTPSecure = "tls";
		$this->mailer->Host = 'smtp.gmail.com';
		$this->mailer->Port = 587;
		$this->mailer->Username = $username;
		$this->mailer->Password = decrypt($password);
		$this->mailer->SetFrom($username, $name);
	}

	public function send_reset($email, $code){
		$this->init();
		$this->mailer->Subject = 'Konfirmasi Reset Akun';
		$this->mailer->Body = $this->mail->reset_mail($email, $code);
		$this->mailer->AddAddress($email);
		
		if($this->mailer->send()){
			return ['status' => true, 'msg' => 'Email verifikasi telah dikirimkan'];
		}else{
			return ['status' => false, 'msg' => 'Email verifikasi gagal dikirimkan'];
		}
	}
}

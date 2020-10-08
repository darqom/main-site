<?php

$config = [
	'save_smtp' => [
		[
			'field' => 'smtp-host',
			'label' => 'Host',
			'rules' => 'required'
		],
		[
			'field' => 'smtp-port',
			'label' => 'Port',
			'rules' => 'required|is_numeric'
		],
		[
			'field' => 'smtp-username',
			'label' => 'Username',
			'rules' => 'required'
		],
		[
			'field' => 'smtp-name',
			'label' => 'Nama Pengirim',
			'rules' => 'required'
		]
	],
	'reset_pass' => [
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[8]'
		],
		[
			'field' => 'password2',
			'label' => 'Konfirmasi Password',
			'rules' => 'required|matches[password]'
		]
	],
	'save_insitute' => [
		[
			'field' => 'description',
			'label' => 'Deskripsi',
			'rules' => 'required'
		],
		[
			'field' => 'phone',
			'label' => 'Nomor Telepon',
			'rules' => 'required'
		],
		[
			'field' => 'email',
			'label' => 'Alamat Email',
			'rules' => 'required|valid_email'
		],
		[
			'field' => 'address',
			'label' => 'Alamat Sekolah',
			'rules' => 'required'
		],
		[
			'field' => 'youtube-embed',
			'label' => 'Youtube Embed',
			'rules' => 'required'
		],
		[
			'field' => 'facebook',
			'label' => 'ID Facebook',
			'rules' => 'required'
		],
		[
			'field' => 'facebook-name',
			'label' => 'Nama Akun Facebook',
			'rules' => 'required'
		],
		[
			'field' => 'youtube',
			'label' => 'ID Youtube',
			'rules' => 'required'
		],
		[
			'field' => 'youtube-name',
			'label' => 'Nama Akun Youtube',
			'rules' => 'required'
		],
		[
			'field' => 'instagram',
			'label' => 'ID Instagram',
			'rules' => 'required'
		],
		[
			'field' => 'instagram-name',
			'label' => 'Nama Akun Instagram',
			'rules' => 'required'
		]
	],
	'facility_article' => [
		[
			'field' => 'article',
			'label' => 'Artikel',
			'rules' => 'required'
		]
	],
	'add_menu' => [
		[
			'field' => 'label',
			'label' => 'Label',
			'rules' => 'required'
		],
		[
			'field' => 'link',
			'label' => 'Link',
			'rules' => 'required'
		]
	],
	'save_page' => [
		[
			'field' => 'title',
			'label' => 'Judul',
			'rules' => 'required|is_unique[pages.page_title]'
		],
		[
			'field' => 'content',
			'label' => 'Konten',
			'rules' => 'required'
		]
	],
	'edit_page' => [
		[
			'field' => 'title',
			'label' => 'Judul',
			'rules' => 'required'
		],
		[
			'field' => 'content',
			'label' => 'Konten',
			'rules' => 'required'
		]
	],
	'save_profile' => [
		[
			'field' => 'fullname',
			'label' => 'Nama Lengkap',
			'rules' => 'required|min_length[3]'
		],
		[
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		],
		[
			'field' => 'gender',
			'label' => 'Jenis Kelamin',
			'rules' => 'required'
		]
	],
	'save_profile_pass' => [
		[
			'field' => 'old-pass',
			'label' => 'Password lama',
			'rules' => 'required'
		],
		[
			'field' => 'new-pass',
			'label' => 'Password baru',
			'rules' => 'required|min_length[8]'
		],
		[
			'field' => 'confirm-pass',
			'label' => 'Konfirmasi',
			'rules' => 'required|matches[new-pass]'
		]
	]
];

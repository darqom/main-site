<?php

$config = [
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
	]
];

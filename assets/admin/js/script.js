"use strict";
var baseUrl = $('#baseUrl').data('url');

const showAlert = data => {
	const {el, type, icon, text} = data;
	$(el).html(`
		<div class="alert alert-${type}"><i class="fas fa-${icon} fa-pulse"></i> ${text}</div>
		`);
}

const delAlert = el => {
	$(el).html('');
}

const validate = data => {
	$.each(data.errors, function(i, item){
		(item.msg != '') ? $(`input#${item.name}`).addClass('is-invalid') : $(`input#${item.name}`).removeClass('is-invalid');
		$(`.${item.name}-error`).html(item.msg);
	});
}

const checkLogin = form => {
	$.ajax({
		url: baseUrl + 'admin/auth/check_login',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			delAlert('.message');
			switch(data.status){
				case 'validate':
				validate(data);
				break;
				case 'error':
				showAlert({
					el: '.message',
					type: 'danger',
					icon: 'times-circle',
					text: data.msg
				});
				break;
				case 'success':
				showAlert({
					el: '.message',
					type: 'success',
					icon: 'check-circle',
					text: data.msg
				});
				document.location.href = baseUrl + 'admin/dashboard';
				break;
			}
		}
	});
}

$('#login-form').on('submit', function(e){
	showAlert({
		el: '.message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});

	e.preventDefault();
	checkLogin($(this));
});

/* Post */

const uploadImageSummer = image => {
	let data = new FormData();
	data.append('image', image);

	$.ajax({
		url: baseUrl + 'admin/post/upload_image',
		cache: false,
		processData: false,
		contentType: false,
		data: data,
		method: 'post',
		dataType: 'json',
		success: function(data){
			if(data.status == 'success'){
				$('#post-content').summernote('insertImage', data.url);
			}else{
				console.warn(data.msg);
			}
		}
	});
}

const deleteImageSummer = src => {
	$.ajax({
		url: baseUrl + 'admin/post/delete_image',
		data: {src: src},
		method: 'post'
	});
}

$('#post-content').summernote({
	height: '40vh',
	callbacks: {
		onImageUpload: image => {
			uploadImageSummer(image[0]);
		},
		onMediaDelete: target => {
			deleteImageSummer(target[0].src);
		}
	}
});

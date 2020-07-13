/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

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
 				document.location.href = baseUrl + 'admin/home';
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

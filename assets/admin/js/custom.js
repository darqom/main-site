/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

 "use strict";
 var baseUrl = $('#baseUrl').data('url');

 const checkLogin = form => {
 	$.ajax({
 		url: baseUrl + 'admin/auth/check_login',
 		method: 'post',
 		data: form.serialize(),
 		dataType: 'json',
 		success: function(data){
 			delAlert('.message');
 			if(data.status == 'error'){
 				$.each(data.errors, function(i, item){
 					$(`.${item.name}-error`).html(item.msg);
 				});
 			}
 		}
 	});
 }

 const alertProcess = selector => {
 	$(selector).html(`
 		<div class="alert alert-info"><i class="fas fa-spinner fa-pulse"></i> Sedang diproses...</div>
 		`);
 }

 const delAlert = selector => {
 	$(selector).html('');
 }

 $('#login-form').on('submit', function(e){
 	alertProcess('.message');
 	e.preventDefault();
 	checkLogin($(this));
 });

/* =============== LOGIN BLOCK =============== */
/*    ============_____________============    */

$('#login-form').on('submit', function(e){
	showAlert({
		el: '.message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});

	e.preventDefault();
	delValidate(['username', 'password']);
	checkLogin($(this));
});

/* =============== FORGOT BLOCK =============== */
/*    ============_____________============    */

$('#forgot-form').on('submit', function(e){
	e.preventDefault();
	const form = $(this);

	showAlert({
		el: '.message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});

	$.ajax({
		url: baseUrl + 'admin/auth/forgot',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			if(data.status == 'error'){
				showAlert({
					el: '.message',
					type: 'danger',
					icon: 'times-circle',
					text: data.msg
				});
			}else{
				showAlert({
					el: '.message',
					type: 'success',
					icon: 'check-circle',
					text: data.msg
				});
			}
		}
	});
});

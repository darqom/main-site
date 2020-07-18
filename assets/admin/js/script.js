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

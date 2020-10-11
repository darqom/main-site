$('#save-smtp-form').on('submit', function(e){
	e.preventDefault();
	const form = $(this);
	delValidate(['smtp-host', 'smtp-port', 'smtp-username', 'smtp-name']);
	showFixLoader();

	$.ajax({
		url: baseUrl + 'admin/settings/smtp',
		data: form.serialize(),
		method: 'post',
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				Swal.close();
				validate(data);
			}else{
				Swal.fire({
					icon: data.status,
					title: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
			}
		}
	});
});

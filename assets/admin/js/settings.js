previewImg('#banner-upload', '#banner-preview', '#banner-label');
previewImg('#logo-upload', '#logo-preview', '#logo-label');
previewImg('#footer-logo-upload', '#footer-logo-preview', '#footer-logo-label');

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

$('#save-general-form').on('submit', function(e){
	e.preventDefault();
	const formData = new FormData(this);
	delValidate(['site-title']);
	showFixLoader();

	$.ajax({
		url: baseUrl + 'admin/settings/general',
		method: 'post',
		data: formData,
		contentType: false,
		processData: false,
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
					timer: 1500
				});
			}
		}
	});
});

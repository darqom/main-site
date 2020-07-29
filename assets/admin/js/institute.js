$('#form-save-profile').submit(function(e){
	e.preventDefault();
	const form = $(this);
	showFixLoader();
	delValidate(['description', 'phone', 'email', 'address', 'youtube-embed', 'facebook', 'facebook-name', 'youtube', 'youtube-name', 'instagram', 'instagram-name']);

	$.ajax({
		url: baseUrl + 'admin/institute/save',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				validate(data);
				Swal.close();
			}else{
				Swal.fire({
					icon: data.status,
					title: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
			}
		},
		error: function(data){
			console.log(data.responseText);
			Swal.close();
		}
	});
});

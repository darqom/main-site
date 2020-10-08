
$('#img-profile').on('change', function(e){
	if(this.files && this.files[0]){
		const reader = new FileReader();

		reader.onload = function(e){
			$('.img-edit').attr('src', e.target.result);
		}

		reader.readAsDataURL(this.files[0]);
	}
});

$('#form-save-profile').on('submit', function(e){
	e.preventDefault();
	delValidate(['fullname', 'email', 'gender', 'bio']);
	const formData = new FormData(this);

	$.ajax({
		url: baseUrl + 'admin/profile/save',
		method: 'post',
		data: formData,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				validate(data);
			}else{
				Swal.fire({
					icon: 'success',
					showConfirmButton: false,
					timer: 2000,
					title: 'Berhasil disimpan'
				});
				const pictureAddr = `${baseUrl}assets/admin/img/profile/${data.user.image}`;
				$('.profile-widget .profile-widget-picture').attr('src', pictureAddr);
				$('.profile-widget .profile-widget-name').html(data.user.fullname);
				$('.profile-widget .profile-widget-bio').html(data.user.bio);
			}
		}
	});
});

$('#form-save-password').on('submit', function(e){
	e.preventDefault();
	delValidate(['old-pass', 'new-pass', 'confirm-pass']);
	showAlert({
		el: '.form-message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});
	const form = $(this);

	$.ajax({
		url: baseUrl + 'admin/profile/save_password',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				delAlert('.form-message');
				validate(data);
			}else if(data.status == 'success'){
				delAlert('.form-message');
				form.trigger('reset');
				Swal.fire({
					icon: 'success',
					showConfirmButton: false,
					timer: 1500,
					title: data.msg
				});
			}else{
				showAlert({
					el: '.form-message',
					type: 'danger',
					icon: 'times-circle',
					text: data.msg
				});
			}
		}
	});
});

var baseUrl = $('#baseUrl').data('url');

function toastSuccess(text, duration){
	Toastify({
		text: text,
		duration: duration,
		gravity: 'bottom',
		position: 'left',
		close: true,
		backgroundColor: '#47c363',
		stopOnFocus: true,
	}).showToast();
}

function toastDanger(text, duration){
	Toastify({
		text: text,
		duration: duration,
		gravity: 'bottom',
		position: 'left',
		close: true,
		backgroundColor: '#fc544b',
		stopOnFocus: true,
	}).showToast();
}

function toastInfo(text, duration){
	Toastify({
		text: text,
		duration: duration,
		gravity: 'bottom',
		position: 'left',
		close: true,
		backgroundColor: '#3abaf4',
		stopOnFocus: true,
	}).showToast();
}

function toastWarning(text, duration){
	Toastify({
		text: text,
		duration: duration,
		gravity: 'bottom',
		position: 'left',
		close: true,
		backgroundColor: '#ffa426',
		stopOnFocus: true,
	}).showToast();
}

function showFixLoader(){
	Swal.fire({
		html: `
		<i style="font-size: 5em;" class="fas fa-spinner fa-pulse"></i>
		`,
		showConfirmButton: false,
		allowOutsideClick: false
	});
}

function swalConfirm(callback, params = null){
	Swal.fire({
		icon: 'warning',
		title: 'Apakah anda yakin?',
		showCancelButton: true,
		confirmButtonText: 'Ya',
		cancelButtonText: 'Batal',
		reverseButtons: true
	}).then( result => {
		if(result.value){
			callback(params);
		}
	});
}

function previewImg(el, prevEl){
	$(el).on('change', function(){
		if(this.files && this.files[0]){
			const reader = new FileReader();

			reader.onload = function(e){
				$(prevEl).html(`<img src="${e.target.result}" width="100%">`);
			}

			reader.readAsDataURL(this.files[0]);
		}
	});
}

function resetPreviewImg(prevEl){
	$(prevEl).html('');
}

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

const delValidate = els => {
	els.forEach(el => {
		$(`input#${el}`).removeClass('is-invalid');
		$(`.${el}-error`).html('');
	});
}

function initDatatable(table){
	$(table.el).DataTable({
		processing: true,
		serverSide: true,
		ordering: true,
		order: [[0, 'asc']],
		ajax: {
			url: baseUrl + table.url,
			type: 'post'
		},
		deferRender: true,
		aLengthMenu: [[5, 10, 50], [5, 10, 50]],
		columns: table.columns
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

function addCategory(form, callback){
	$.ajax({
		url: baseUrl + 'admin/post/add_category',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			delAlert('.loader');
			if(data.status == 'validate'){
				validate(data);
			}else if(data.status == 'success'){
				callback(data.data);
				toastSuccess('Kategori berhasil ditambahkan', 4000);
			}
		}
	});
}

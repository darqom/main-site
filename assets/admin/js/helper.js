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

function previewImg(el, prevEl, label){
	$.uploadPreview({
		input_field: el,
		preview_box: prevEl,
		label_field: label,
		label_default: "Pilih File",
		label_selected: "Ubah File",
		no_label: false,
		success_callback: null
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

const uploadImageSummer = (el, image, path) => {
	let data = new FormData();
	data.append('image', image);
	data.append('path', path);

	$.ajax({
		url: baseUrl + 'admin/image/upload',
		cache: false,
		processData: false,
		contentType: false,
		data: data,
		method: 'post',
		dataType: 'json',
		success: function(data){
			if(data.status == 'success'){
				$(el).summernote('insertImage', data.url);
			}else{
				console.warn(data.msg);
			}
		},
		error: function(data){
			console.warn(data.responseText);
		}
	});
}

const deleteImageSummer = src => {
	$.ajax({
		url: baseUrl + 'admin/image/delete',
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

function convertSlug(text){
	return text
	.toLowerCase()
	.replace(/[^\w ]+/g,'')
	.replace(/ +/g,'-')
	;
}

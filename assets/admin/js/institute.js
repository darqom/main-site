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

initDatatable({
	el: '#tbl-extra',
	url: 'admin/institute/extra_json',
	columns: [
	{render: function(data, type, row, meta){
		return meta.row + meta.settings._iDisplayStart + 1;
	}},
	{render: function(data, type, row){
		return `<img src="${baseUrl}assets/img/extra/${row.extra_image}" alt="cover" style="width: 5em;" />`;
	}},
	{data: 'extra_name'},
	{render: function(data, type, row){
		return `
		<button class="btn btn-sm btn-danger btn-del-extra" data-id="${row.id}"><i class="fas fa-trash-alt"></i></button>
		`;
	}}
	]
});

previewImg('#extra-cover-input', '#prev-img');

$('#form-add-extra').submit(function(e){
	e.preventDefault();
	showFixLoader();
	delValidate(['name']);
	const formData = new FormData(this);
	$.ajax({
		url: baseUrl + 'admin/institute/add_extra',
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
				resetPreviewImg('#prev-img');
				$('#form-add-extra').trigger('reset');
				$('#tbl-extra').DataTable().ajax.reload();
				Swal.fire({
					icon: data.status,
					html: data.msg,
					timer: 2000
				});
			}
		}
	});
});

const deleteExtra = id => {
	$.ajax({
		url: baseUrl + 'admin/institute/del_extra',
		method: 'post',
		data : {id: id},
		dataType: 'json',
		success: function(data){
			console.log(data);
			$('#tbl-extra').DataTable().ajax.reload();
			Swal.fire({
				icon: data.status,
				title: data.msg
			});
		}
	});
}

$('#tbl-extra').on('click', '.btn-del-extra', function(){
	showFixLoader();
	const id = $(this).data('id');
	swalConfirm(deleteExtra, id);
});

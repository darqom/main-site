function deletePage(id){
	showFixLoader();
	$.ajax({
		url: baseUrl + 'admin/pages/delete',
		method: 'post',
		data: {id: id},
		dataType: 'json',
		success: function(data){
			Swal.fire({
				icon: data.status,
				title: data.msg,
				showConfirmButton: false,
				timer: 2000
			});
			$('#tbl-pages').DataTable().ajax.reload();
		}
	});
}

$('#page-content').summernote({
	height: '40vh',
	callbacks: {
		onImageUpload: image => {
			uploadImageSummer('#page-content', image[0], 'page');
		},
		onMediaDelete: target => {
			deleteImageSummer(target[0].src);
		}
	}
});

initDatatable({
	el: '#tbl-pages',
	url: 'admin/pages/json',
	columns: [
	{render: function(data, type, row, meta){
		return meta.row + meta.settings._iDisplayStart + 1;
	}},
	{data: 'page_title'},
	{render: function(data, type, row){
		const url = `${baseUrl}page/${row.page_slug}`;
		const short = url.replace(/(^\w+:|^)\/\//, '');
		return `<a target="_blank" href="${url}">${short}</a>`;
	}},
	{render: function(data, type, row){
		return `
			<button class="btn btn-sm btn-danger btn-del-page" data-id="${row.id}" title="hapus"><i class="fas fa-trash-alt"></i></button>
			<a class="btn btn-sm btn-primary" href="${baseUrl}admin/pages/edit/${row.id}" title="edit"><i class="fas fa-pencil-alt"></i></a>
		`;
	}}
	]
});

$('#page-title').on('keyup', function(){
	let val = $(this).val();
	$('#page-link-preview').html(`${baseUrl}page/${convertSlug(val)}`);
});

$('#form-add-page').submit(function(e){
	e.preventDefault();
	showFixLoader();
	delValidate(['title', 'content']);
	const form = $(this);
	$.ajax({
		url: baseUrl + 'admin/pages/save',
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
		}
	});
});

$('#tbl-pages').on('click', '.btn-del-page', function(){
	const id = $(this).data('id');
	swalConfirm(deletePage, id);
});

$('#form-edit-page').submit(function(e){
	e.preventDefault();
	showFixLoader();
	delValidate(['title', 'content']);
	const form = $(this);
	$.ajax({
		url: window.location.href,
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
		}
	});
});

previewImg('#cover-upload', '#cover-preview', '#cover-label');
$('#post-content').summernote({
	height: '40vh',
	callbacks: {
		onImageUpload: image => {
			uploadImageSummer('#post-content', image[0], 'post');
		},
		onMediaDelete: target => {
			deleteImageSummer(target[0].src);
		}
	}
});

/* Add Category */
function updateCatUI(data){
	$('.category-container').append(`
		<div class="form-check">
		<input class="form-check-input" type="checkbox" value="${data.id}" id="cat-${data.id}" name="categories[]">
		<label class="form-check-label" for="cat-${data.id}">
		${data.name}
		</label>
		</div>
		`);
	$('#add-category-form').trigger('reset');
	$('#addCategoryModal').modal('toggle');
	$('#tbl-categories').DataTable().ajax.reload();
}

$('#add-category-form').submit(function(e){
	e.preventDefault();
	showAlert({
		el: '.loader',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});
	delValidate(['category']);
	addCategory($(this), updateCatUI);
});

$('#save-post-form').submit(function(e){
	e.preventDefault();
	delValidate(['title', 'content']);
	showFixLoader();
	const formData = new FormData(this);
	$.ajax({
		url: baseUrl + 'admin/post/save',
		method: 'post',
		data: formData,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				Swal.close();
				validate(data);
			}else if(data.status == 'success'){
				$('#post-content').summernote('code', '');
				$('#save-post-form').trigger('reset');
				Swal.fire({
					icon: 'success',
					title: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
			}else{
				Swal.fire({
					icon: 'error',
					html: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
			}
		}
	});
});

$('#edit-post-form').submit(function(e){
	e.preventDefault();
	delValidate(['title', 'content']);
	showFixLoader();
	const formData = new FormData(this);
	$.ajax({
		url: baseUrl + 'admin/post/edit_post',
		method: 'post',
		data: formData,
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				Swal.close();
				validate(data);
			}else if(data.status == 'success'){
				Swal.fire({
					icon: 'success',
					title: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
			}else{
				Swal.fire({
					icon: 'error',
					html: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
			}
		}
	});
});

initDatatable({
	el: '#tbl-posts',
	url: 'admin/post/posts_json',
	columns: [
	{render: function(data, type, row, meta){
		return meta.row + meta.settings._iDisplayStart + 1;
	}},
	{data: 'post_title'},
	{data: 'post_author'},
	{data: 'post_status'},
	{data: 'created_at'},
	{data: 'updated_at'},
	{render: function(data, type, row){
		return `
		<a class="btn btn-sm btn-success" href="${baseUrl}admin/post/edit/${row.id}"><i class="fas fa-pencil-alt"></i></a>
		<button class="btn btn-sm btn-danger btn-del-post" data-id="${row.id}"><i class="fas fa-trash-alt"></i></button>
		`;
	}}
	]
});

const deletePost = id => {
	$.ajax({
		url: baseUrl + 'admin/post/del_post',
		method: 'post',
		data: {id : id},
		dataType: 'json',
		success: function(data){
			if(data.status = 'success'){
				toastSuccess(data.msg);
			}else{
				toastDanger(data.msg);
			}

			$('#tbl-posts').DataTable().ajax.reload();
		}
	});
}

$('#tbl-posts').on('click', '.btn-del-post', function(){
	const id = $(this).data('id');
	swalConfirm(deletePost, id);
});

initDatatable({
	el: '#tbl-categories',
	url: 'admin/post/categories_json',
	columns: [
	{data: 'name'},
	{render: function(data, type, row){
		return `
		<button class="btn btn-sm btn-danger btn-del-category" data-id="${row.id}"><i class="fas fa-trash-alt"></i> Hapus</button>
		`;
	}}
	]
});

const deleteCategory = id =>{
	$.ajax({
		url: baseUrl + 'admin/post/del_category',
		method: 'post',
		data: {id : id},
		dataType: 'json',
		success: function(data){
			if(data.status = 'success'){
				toastSuccess(data.msg);
			}else{
				toastDanger(data.msg);
			}

			$('#tbl-categories').DataTable().ajax.reload();
		}
	});
}

$('#tbl-categories').on('click', '.btn-del-category', function(e){
	const id = $(this).data('id');
	swalConfirm(deleteCategory, id);
});

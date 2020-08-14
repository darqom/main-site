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

previewImg('#image-input', '#image-preview2');

function fillFacilityFormOne(id){
	delValidate(['name', 'icon']);
	$('#edit-facility-form').trigger('reset');
	showAlert({el: '.form-message', type: 'info', icon: 'spinner', text: 'Sedang diproses...'});
	$.ajax({
		url: baseUrl + 'admin/institute/get_facility',
		method: 'post',
		data: {id: id},
		dataType: 'json',
		success: function(data){
			delAlert('.form-message');
			if(data.status == 'success'){
				$.each(data.facility, (key, value) => {
					$(`#editFaclity1Container input#${key}`).val(value);
				});
			}
		}
	});
}

function fillFacilityFormTwo(id){
	delValidate(['name']);
	$('#edit-facility2-form').trigger('reset');
	showAlert({el: '.form-message', type: 'info', icon: 'spinner', text: 'Sedang diproses...'});
	$.ajax({
		url: baseUrl + 'admin/institute/get_facility',
		method: 'post',
		data: {id: id},
		dataType: 'json',
		success: function(data){
			delAlert('.form-message');
			if(data.status == 'success'){
				const facility = data.facility;
				$('#id2').val(facility.id);
				$('#facility_name2').val(facility.facility_name);
				$('#image2').attr('src', `${baseUrl}assets/img/facility/${facility.facility_image}`);
			}
		}
	});
}

function updateFacilityIconList(facilities){
	let html = '';
	const color = ['primary', 'success', 'danger'];
	$.each(facilities, (i, facility) => {
		html += `
		<div class="col-md-4">
		<div class="card shadow card-statistic-1">
		<span class="card-icon bg-${color[i]}">
		<i class="fas ${facility.facility_icon}"></i>
		</span>
		<div class="card-wrap">
		<div class="card-header"></div>
		<div class="card-body">
		${facility.facility_name}
		</div>
		</div>
		<a href="#" style="font-size: 1em;" class="btn-edit-facility mr-2" data-id="${facility.id}">Edit</a>
		<a href="" style="font-size: 1em;">Artikel</a>
		</div>
		</div>
		`;
	});

	$('#list-fasilities-icon-container').html(html);
}

function updateFacilityImageList(facilities){
	let html = '';
	$.each(facilities, (i, facility) => {
		html += `
		<div class="col-md-4">
		<div class="card shadow">
		<div class="card-body">
		<h6 style="display: inline-block;">${facility.facility_name}</h6>
		<button class="btn btn-sm btn-outline-dark float-right mb-2 btn-edit-facility" data-id="${facility.id}"><i class="fas fa-pencil-alt"></i></button>
		<a class="btn btn-sm btn-outline-dark float-right mb-2 mr-2"><i class="fas fa-paste"></i></a>
		<img src="${baseUrl}/assets/img/facility/${facility.facility_image}" alt="Image" width="100%" class="rounded">
		</div>
		</div>
		</div>
		`;
	});
	$('#list-fasilities-image-container').html(html);
}

$('#list-fasilities-icon-container').on('click', '.btn-edit-facility', function(e){
	e.preventDefault();
	const id = $(this).data('id');
	fillFacilityFormOne(id);
	$('#modalEditFacility1').modal('show');
});

$('#list-fasilities-image-container').on('click', '.btn-edit-facility', function(e){
	e.preventDefault();
	const id = $(this).data('id');
	fillFacilityFormTwo(id);
	$('#modalEditFacility2').modal('show');
});

$('#edit-facility-form').on('submit', function(e){
	e.preventDefault();
	const form = $(this);
	showFixLoader();

	$.ajax({
		url: baseUrl + 'admin/institute/save_facility',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				validate(data);
			}else{
				Swal.fire({
					icon: data.status,
					title: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
				updateFacilityIconList(data.facilities);
				$('#modalEditFacility1').modal('toggle');
			}
		}
	});
});

$('#edit-facility2-form').on('submit', function(e){
	e.preventDefault();
	showFixLoader();
	const formData = new FormData(this);
	$.ajax({
		url: baseUrl + 'admin/institute/save_facility',
		data: formData,
		method: 'post',
		contentType: false,
		processData: false,
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				validate(data);
			}else{
				Swal.fire({
					icon: data.status,
					title: data.msg,
					showConfirmButton: false,
					timer: 2000
				});
				updateFacilityImageList(data.facilities);
				$('#modalEditFacility2').modal('toggle');
			}
		}
	});
});

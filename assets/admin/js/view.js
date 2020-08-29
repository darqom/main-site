function addSubMenuField(){
	$.ajax({
		url: baseUrl + 'admin/menu/get_menu',
		method: 'post',
		dataType: 'json',
		success: function(data){
			let el = `
			<div class="form-group">
			<label for="menu">Menu</label>
			<select name="menu" id="menu" class="form-control input-sm">
			`;

			$.each(data, (i, menu) => {
				el += `<option value="${menu.id}">${menu.label}</option>`
			});
			el += `

			</select>
			</div>
			`;
			$('#sub-menu-add').html(el);
		}
	});
}

function displayMenuStructure(){
	$.ajax({
		url: baseUrl + 'admin/menu/get_menu',
		method: 'post',
		dataType: 'json',
		success: function(menus){
			let el = '';
			let subEl = '';

			$.each(menus, (i, menu) => {
				if(menu.sub_menu != null){
					$.each(menu.sub_menu, (i, subMenu) => {
						subEl += `
						<h6 class="ml-2 mb-3">${subMenu.label}
						<button class="btn btn-sm btn-outline-primary float-right mr-4 btn-edit-menu" data-id="${subMenu.id}"><i class="fas fa-pencil-alt"></i></button>
						</h6>
						`;
					});

					el += `
					<div class="border rounded mt-1 p-2">
					<h6 data-toggle="collapse" data-target="#menu-item${menu.id}"aria-expanded="false" class="has-arrow m-0">${menu.label} <span class="float-right mr-4">
					<button class="btn btn-sm btn-outline-primary btn-edit-menu" data-id="${menu.id}"><i class="fas fa-pencil-alt"></i></button></span>
					</h6>
					<div class="in collapse p-2 mt-2 bg-light rounded" id="menu-item${menu.id}">
					${subEl}
					</div>
					</div>
					`;
				}else{
					el += `
					<div class="border rounded mt-1 p-2">
					<h6>${menu.label} <span class="float-right mr-4">
					<button class="btn btn-sm btn-outline-primary btn-edit-menu" data-id="${menu.id}"><i class="fas fa-pencil-alt"></i></button></span>
					</h6>
					</div>
					`;
				}
			});

			$('#list-menu-container').html(el);
		}
	});
}

function fillEditMenuForm(id){
	delValidate(['edit-label', 'edit-link']);
	$('#edit-menu-form').trigger('reset');
	$.ajax({
		url: baseUrl + 'admin/menu/get_menu',
		method: 'post',
		data: {id: id},
		dataType: 'json',
		success: function(data){
			$('#edit-id').val(data[0].id);
			$('#edit-label').val(data[0].label);
			$('#edit-link').val(data[0].link);
			delAlert('.edit-message');
		}
	});
}

$('#is-sub-menu').change(function(){
	const subMenu = $('#is-sub-menu:checked').length;
	if(subMenu > 0){
		addSubMenuField();
	}else{
		$('#sub-menu-add').html('');
	}
});

$('#form-add-menu').submit(function(e){
	e.preventDefault();
	showFixLoader();
	delValidate(['label', 'link']);
	const form = $(this);
	$.ajax({
		url: baseUrl + 'admin/menu/add_menu',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				validate(data);
				Swal.close();
			}else{
				displayMenuStructure();
				form.trigger('reset');
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

$('#list-menu-container').on('click', '.btn-edit-menu', function(){
	const id = $(this).data('id');
	$('#modalEditMenu').modal('show');
	showAlert({
		el: '.edit-message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang mengambil data...'
	});

	fillEditMenuForm(id);
});

$('#edit-menu-form').submit(function(e){
	e.preventDefault();
	const form = $(this);
	delValidate(['edit-label', 'edit-link'])
	showAlert({el: '.edit-message', type: 'info', icon: 'spinner', text: 'Sedang diproses...'});

	$.ajax({
		url: baseUrl + 'admin/menu/edit_menu',
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
			}
			delAlert('.edit-message');
		}
	});
});

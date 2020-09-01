initDatatable({
	el: '#tbl-users',
	url: 'admin/users/users_json',
	columns: [
	{render: function(data, type, row, meta){
		return meta.row + meta.settings._iDisplayStart + 1;
	}},
	{data: 'username'},
	{data: 'fullname'},
	{data: 'email'},
	{render: function(data, type, row){
		return (row.role == '1') ? 'admin' : 'user';
	}},
	{render: function(data, type, row){
		return `
		<button class="btn btn-sm btn-danger btn-del-user" data-username="${row.username}"><i class="fas fa-trash-alt"></i></button>
		`;
	}}
	]
});

$('#add-user-form').on('submit', function(e){
	e.preventDefault();
	showFixLoader();
	const form = $(this);
	delValidate(['username', 'email', 'fullname']);
	$.ajax({
		url: baseUrl + 'admin/users/add',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			if(data.status == 'validate'){
				Swal.close();
				validate(data);
			}else{
				$('#tbl-users').DataTable().ajax.reload();
				$('#addUserModal').modal('toggle');
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

const deleteUser = username =>{
	showFixLoader();
	$.ajax({
		url: baseUrl + 'admin/users/delete',
		method: 'post',
		data: {username: username},
		dataType: 'json',
		success: function(data){
			$('#tbl-users').DataTable().ajax.reload();
			Swal.fire({
				icon: data.status,
				title: data.msg,
				showConfirmButton: false,
				timer: 2000
			});
		}
	});
}

$('#tbl-users').on('click', '.btn-del-user', function(){
	const username = $(this).data('username');
	swalConfirm(deleteUser, username);
});

initDatatable({
	el: '#tbl-events',
	url: 'admin/event/event_json',
	columns: [
	{render: function(data, type, row, meta){
		return meta.row + meta.settings._iDisplayStart + 1;
	}},
	{data: 'event_date'},
	{data: 'event_time'},
	{data: 'event_title'},
	{render: function(data, type, row){
		return `
		<button class="btn btn-sm btn-success btn-edit-event" data-id="${row.id}"><i class="fas fa-pencil-alt"></i></button>
		<button class="btn btn-sm btn-danger btn-del-event" data-id="${row.id}"><i class="fas fa-trash-alt"></i></button>
		`;
	}}
	]
});

$('#add-event-form').submit(function(e){
	e.preventDefault();
	delValidate(['title', 'description', 'date', 'time', 'time2']);
	showAlert({
		el: '.form-message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});

	const form = $(this);
	$.ajax({
		url: baseUrl + 'admin/event/add_event',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			delAlert('.form-message');
			if(data.status == 'validate'){
				validate(data);
			}else{
				form.trigger('reset');
				$('#tbl-events').DataTable().ajax.reload();
				$('#addEventModal').modal('toggle');
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

const deleteEvent = id => {
	showFixLoader();
	$.ajax({
		url: baseUrl + 'admin/event/del_event',
		method: 'post',
		data: {id: id},
		dataType: 'json',
		success: function(data){
			$('#tbl-events').DataTable().ajax.reload();
			Swal.fire({
				icon: data.status,
				title: data.msg,
				showConfirmButton: false,
				timer: 2000
			});
		}
	});
}

const fillEventForm = id =>{
	$.ajax({
		url: baseUrl + 'admin/event/get_event',
		method: 'post',
		data: {id: id},
		dataType: 'json',
		success: function(res){
			delAlert('.form-message');
			if(res.status == 'success'){
				const data = res.data;
				$('#edit-id').val(data.id);
				$('#edit-title').val(data.title);
				$('#edit-description').val(data.description);
				$('#edit-date').val(data.date);
				$('#edit-time').val(data.start_time);
				$('#edit-time2').val(data.end_time);
			}
		}
	});
}

$('#tbl-events').on('click', '.btn-del-event', function(){
	const id = $(this).data('id');
	swalConfirm(deleteEvent, id);
});

$('#tbl-events').on('click', '.btn-edit-event', function(){
	const id = $(this).data('id');
	$('#edit-event-form').trigger('reset');
	$('#editEventModal').modal('toggle');
	showAlert({
		el: '.form-message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang dimuat...'
	});
	fillEventForm(id);
});

$('#edit-event-form').submit(function(e){
	e.preventDefault();
	delValidate(['edit-title', 'edit-description', 'edit-date', 'edit-time', 'edit-time2']);
	showAlert({
		el: '.form-message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});

	const form = $(this);
	$.ajax({
		url: baseUrl + 'admin/event/edit_event',
		method: 'post',
		data: form.serialize(),
		dataType: 'json',
		success: function(data){
			delAlert('.form-message');
			if(data.status == 'validate'){
				validate(data);
			}else{
				form.trigger('reset');
				$('#tbl-events').DataTable().ajax.reload();
				$('#editEventModal').modal('toggle');
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

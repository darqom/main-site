/* =============== LOGIN BLOCK =============== */
/*    ============_____________============    */

$('#login-form').on('submit', function(e){
	showAlert({
		el: '.message',
		type: 'info',
		icon: 'spinner',
		text: 'Sedang diproses...'
	});

	e.preventDefault();
	delValidate(['username', 'password']);
	checkLogin($(this));
});

/* =============== POST BLOCK =============== */
/*    ============____________============    */

$('#post-content').summernote({
	height: '40vh',
	callbacks: {
		onImageUpload: image => {
			uploadImageSummer(image[0]);
		},
		onMediaDelete: target => {
			deleteImageSummer(target[0].src);
		}
	}
});

previewImg('#image-cover', '.prev-img');

/* Add Category */
function updateCatUI(data){
	$('.category-container').append(`
		<div class="form-check">
		<input class="form-check-input" type="checkbox" value="${data.id}" id="cat-${data.id}">
		<label class="form-check-label" for="cat-${data.id}">
		${data.name}
		</label>
		</div>
		`);
	$('#add-category-form').trigger('reset');
	$('#addCategoryModal').modal('toggle');
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

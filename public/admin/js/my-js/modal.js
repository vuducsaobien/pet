$(document).ready(function() {
	
	// Modal
	$('#myModal').on('shown.bs.modal', function () {
		// $('#myInput').trigger('focus');
		// ('input[name=name]').blur().not();
		$inputNewCategory.focus().select();
	})

	// Close Modal
	$('button.modal-category-save').click(function (e) {
		e.preventDefault();
		let new_category_name = $inputNewCategory.val();
		let new_parent_id = $selectNewCategory.val();

		// console.log('gg = ' + gg);
		// console.log('ff = ' + ff);
		// console.log('hh = ' + hh);

		if (new_category_name != '' && new_parent_id != '') {
	
			let $url = $inputNewCategory.data('url');
			$url = $url.replace("id_new", new_parent_id).replace("name_new", new_category_name);

			// callAjax($(this), $url, 'popup');
			callAjax($selectNewCategory, $url, 'popup');
		}

		$inputNewCategory.val('');
		$selectNewCategory.find('option:selected').remove();
		$('#exampleModal').modal('hide');
		return false;
	})

});


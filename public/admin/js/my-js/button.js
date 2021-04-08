$(document).ready(function() {
	/* ---------- Button - Dropdown ---------- */
	
	$btnSearch.click(function() {

		var pathname	= window.location.pathname;
		let params 		= ['filter_status'];
		let searchParams= new URLSearchParams(window.location.search);	// ?filter_status=active

		let link		= "";
		$.each( params, function( key, param ) { // filter_status
			if (searchParams.has(param) ) {
				link += param + "=" + searchParams.get(param) + "&" // filter_status=active
			}
		});

		let search_field = $inputSearchField.val();
		let search_value = $inputSearchValue.val();

		if(search_value.replace(/\s/g,"") == ""){
			alert("Nhập vào giá trị cần tìm !!");
		} else {
			window.location.href = pathname + "?" + link + 'search_field='+ search_field + '&search_value=' + search_value;
		}
	});

	$btnClearSearch.click(function() {
		var pathname	= window.location.pathname;
		let searchParams= new URLSearchParams(window.location.search);

		params 			= ['filter_status'];

		let link		= "";
		$.each( params, function( key, param ) {
			if (searchParams.has(param) ) {
				link += param + "=" + searchParams.get(param) + "&"
			}
		});

		window.location.href = pathname + "?" + link.slice(0,-1);
	});

	// Filter by category
	$('select[name="filter_category"]').on("change", function() {
		var pathname = window.location.pathname;
		let searchParams = new URLSearchParams(window.location.search);
		params = [
			"filter_status",
			"search_field",
			"search_value",
		];

		let link = "";
		$.each(params, function(key, value) {
			if (searchParams.has(value)) {
				link += `${value}=${searchParams.get(value)}&`;
			}
		});

		let filter_category = $(this).val();

		window.location.href = `${pathname}?${link}filter_category=${filter_category}`;
	});
	
	// Sort
	$("a.select-field").click(function(e) {
		e.preventDefault();

		let field 		= $(this).data('field');
		let fieldName 	= $(this).html();
		$("button.btn-active-field").html(fieldName + ' <span class="caret"></span>');
		$inputSearchField.val(field);
	});

	// Delete
	$('.btn-delete').on('click', function() {
		if(!confirm('Bạn có chắc muốn xóa phần tử?'))
			return false;
	});

});


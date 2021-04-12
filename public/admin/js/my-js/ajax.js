$(document).ready(function() {
	
	// Ajax Change Ordering
	$inputOrdering.on("change", function () {
		let $currentElement = $(this);
		let value           = $(this).val();
		let $url            = $(this).data("url");
		    $url            = $url.replace("value_new", value);
console.log('$url = ' + $url);
		if (checkInputOrdering(value, 1)) {
            callAjax($currentElement, $url, 'ordering');
        }

	});

	// Ajax Change Link
	$inputLink.on("keyup", function () {
		let $currentElement = $(this);
		let value           = $(this).val();
		let $url            = $(this).data("url");

		callAjax($currentElement, $url, 'link',value);
	});

	// Ajax Change Status
	$btnStatus.click(function (e) {
		e.preventDefault();
		let $currentElement = $(this);
		let $url            = $currentElement.attr("href");

		callAjax($currentElement, $url, 'status');
	});

	// Ajax Change Is Home
	$btnIsHome.click(function (e) {
		e.preventDefault();
		let $currentElement = $(this);
		let $url            = $currentElement.attr("href");

		callAjax($currentElement, $url, 'ishome');
	});

	// Ajax Change SelectBox Value
	$selectChangeAttrAjax.on("change", function () {
		let $currentElement = $(this);
		let select_value    = $(this).val();
		let $url            = $(this).data("url");
		    $url            = $url.replace("value_new", select_value);

		callAjax($currentElement, $url, 'select');
	});

});


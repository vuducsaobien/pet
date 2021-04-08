$(document).ready(function() {
	/* ---------- Currenrcy - Percent ---------- */
	
	if( controllerName == 'discount' )
	{
		// Ajax check Exist Name
		// $.validator.addMethod("checkExists", function(value, element)
		// {
		// 	var inputElem = $('input[name="code"]'),
		// 	    data      = { "code_name" : inputElem.val() },
		// 	    eReport   = ''; //error report

		// 	$.ajax(
		// 	{
		// 		type    : "POST",
		// 		url     : validateEmail.php,
		// 		dataType: "json",
		// 		data    : data,
		// 		success : function(returnData)
		// 		{
		// 			if (returnData!== 'true')
		// 			{
		// 			return '<p>This email address is already registered.</p>';
		// 			}
		// 			else
		// 			{
		// 			return true;
		// 			}
		// 		},
		// 		error: function(xhr, textStatus, errorThrown)
		// 		{
		// 			alert('ajax loading error... ... '+url + query);
		// 			return false;
		// 		}
		// 	});

		// }, '');

		$("form").validate({

			debug       : false,
			errorClass  : "errorValidate",
			errorElement: "span",

			rules: {

				code: {
					required  : true,
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				price: {
					required  : false,
					// digits    : true,
					// min       : 0,
					onlyOne   : ["percent"],
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				percent: {
					required  : false,
					// digits    : true,
					// min       : 0,
					// max       : 100,
					onlyOne   : ["price"],
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				min_price: {
					required    : false,
					// digits      : true,
					// min         : 0,
					// check_higher: true,
					normalizer  : function(value) {
						return $.trim(value);
					},
				},

				max_price: {
					required  : false,
					// digits    : true,
					// min       : 0,
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				total_times: {
					required  : true,
					digits    : true,
					min       : 0,
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				date_start: {
					required  : true,
					// date      : true,
					// normalizer: function(value) {
					// 	return $.trim(value);
					// },
				},

				date_end: {
					required: true,
					// normalizer: function(value) {
					// 	return $.trim(value);
					// },
				},

			},
			highlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
			}
		});

		$.validator.addMethod("check_higher", function( value, element, param ) {

			var val_max = $("input[name=max_price]").val();
	
			return this.optional(element)
				|| (value <= val_max);
		},"Min Price must < Max Price");

		$.validator.addMethod('onlyOne', function(value, element, param) {
			return ($(element).is(':filled') && $('[name="' + param[0] + '"]').is(':blank')) ||
			(($('[name="' + param[0] + '"]').is(':filled')) && $(element).is(':blank'));
		}, "Hãy Nhập Giảm Giá Theo Số Tiền || %");
	}

	// allStorage();
});


$(document).ready(function() {
	/* ---------- Currenrcy - Percent ---------- */
	
	if( controllerName == 'discount' )
	{
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

	if( controllerName == 'comment' )
	{
		$("form").validate({
			debug       : false,
			errorClass  : "errorValidate",
			errorElement: "span",

			rules: {

				name: {
					required  : true,
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				email: {
					required  : true,
					isEmail   : ["email"],
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				product_code: {
					required  : true,
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				message: {
					required  : true,
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				created: {
					required: true,
				},

			},

			highlight: function(element, errorClass) {
				$(element).removeClass(errorClass);
			}
		});

		$.validator.addMethod('isEmail', function(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);

		}, "Hãy Nhập Đúng Giá trị Email");
	}

	if( controllerName == 'product' )
	{
		$("form").validate({
			debug       : false,
			errorClass  : "errorValidate",
			errorElement: "span",
			rules       : {

				name: {
					required  : true,
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				price_sale: {
					required  : false,
					onlyOne   : ["sale"],
					normalizer: function(value) {
						return $.trim(value);
					},
				},

				sale: {
					required  : false,
					onlyOne   : ["price_sale"],
					normalizer: function(value) {
						return $.trim(value);
					},
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


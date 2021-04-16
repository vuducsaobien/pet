$(document).ready(function() {

	// Ajax Modal get Product Image
	$('.modal_quick_view').click(function (e) {
		e.preventDefault();
		let currentElement = $(this);
		let url            = currentElement.attr("href");
		localStorage.setItem('product_id', url.match(/\d+$/));
		console.log('url = ' + url);
		callAjax(currentElement, url, 'modal');
	});

	// add To Cart
	$('.addtocart-btn').click(function (e) {

		e.preventDefault();
		let currentElement = $(this);
		let url            = currentElement.attr("href");
		let quantity       = $('input[name=qtybutton]').val();
		let price          = $('div#product_price').data('price');
		let total_price    = quantity * price;

		if (checkInputOrdering(quantity, 1)) {

			// Get name select Attribute 
			var selectName = [];
			$('select[name^="attribute"]').each(function(key, val) {
				selectName.push($(this).attr('name'));
			});

			let arrAttribID = []; let strAttribID; let arrAttribVal = []; let strAttribVal;
			let arrProductID = []; let strProductID;

			$.each(selectName, function( index, result ) {
				let select          = $('select[name="'+result+'"]');
				let product_id      = select.data('product-id');
				let attribute_id    = select.data('attribute-id');
				let attribute_value = select.val();
				arrProductID.push(product_id);
				arrAttribID.push(attribute_id); 
				arrAttribVal.push(attribute_value);
			})

			strProductID = arrProductID.join(',');
			strAttribID  = arrAttribID.join(',');
			strAttribVal = arrAttribVal.join(',');

			product_id = strProductID.substring(0, strProductID.indexOf(','));

			url        = url
			.replace("product_id", product_id)
			.replace("quantity", quantity)
			.replace("price", price)
			.replace("total_price", total_price)
			.replace("attribute_id", strAttribID)
			.replace("attribute_value", strAttribVal);

			console.log('url = ' + url);
			$('div.shopping-cart-btn').children().attr('hidden', false);
			callAjax(currentElement, url, 'cart');
			$('#exampleModal').modal('hide');		
		}
	});

	// Discount
	$buttonCoupon.click(function(e){
		e.preventDefault();
		let coupon_name   = $('div.discount-code input').val();
		let product_price = htmlToNumber( $product_price.text() );
		let ship          = htmlToNumber( $fee.text() );
		let coupon_price  = htmlToNumber( $coupon.text() );

		let url           = urlCoupon
		.replace('coupon_name', coupon_name)
		.replace('price', product_price + ship)

		// if ( coupon_name !== '' && coupon_price == 0) {
		if ( coupon_name !== '' ) {

			// url = url.replace("default", fee)
			console.log('url = ' + url);
			// localStorage.setItem('ship', fee);
			callAjax(null, url, 'coupon');
			// $("input#ship").val(fee);
		}
	});	

	// Ship Change in Cart
	$('select.shipping_change').on("change", function(e) {
		e.preventDefault();
		let fee = parseInt($(this).val());
		// console.log('fee = ' + fee);

		if (checkNumber(fee)) 
		{
			$coupon.html( format_price(0) );
			let product_price    = htmlToNumber($product_price.text());
			// let product_coupon   = htmlToNumber($coupon.text());
			// let grand_total      = htmlToNumber($product_price.text());
			// let grand_total_ship = grand_total + fee;
			let grand_total = product_price + fee;
			let format      = format_price(grand_total);
			let string      = '<h5>Tổng Cộng: ' + format + '</h5>';
			let selectValue = $(this).val();

			// console.log('fee = ' + fee);
			// console.log('selectValue = ' + selectValue);

			$grandTotal.html(string);
			$fee.html(format_price(fee));
			showNotify($grandTotal, 'Đã Cập nhật Lại Giá Tiền');

			let   value = {
				'fee'             : fee,
				// 'grand_total'     : grand_total,
				// 'grand_total_ship': grand_total_ship,
				'product_price': product_price,
				'grand_total'  : grand_total,
				'selectValue'  : selectValue,
			};

			localStorage.setItem('cart', JSON.stringify(value));

			// Update Fee Cart
			let cart = localStorage.getItem('cart');
			if (cart) {
				let arrtest = JSON.parse(cart);
				$.each(arrtest, function( index, result ) {
					if (index == 'fee') {
						// $('span#fee').html(format_price(result));
					}
		
					// console.log(`index = ${index} - result = ${result}`);
				})
			}
		
			// $(this "select").val("val2");
		}else{
			$fee.html(format_price(0));
			let pri = htmlToNumber($product_price.text());

			let string = '<h5>Tổng Cộng: ' + format_price(pri) + '</h5>';
			$grandTotal.html(string);

		}
	});

	// Checkout Ship

	// Update Infomation From Cart to Checkout
	let address = localStorage.getItem('address');
	if (address !== null && address !== '' && controllerName == 'checkout') {
		$("label#address").html('Địa Chỉ Chính Xác Tại ' + '<u>' + address + '</u>');

		//
		let product_price = parseInt( htmlToNumber( $('td#check-out-product_price').html() ) );
		let ship          = parseInt( localStorage.getItem('ship') );
		let coupon        = parseInt( localStorage.getItem('coupon') );

		// $('p#check-out-fee').html('Phí vận chuyển: ' + format_price(result));
		// $('span#fee').html(format_price(result));
		$('td#check-out-fee').html('+ ' + format_price(ship));	
		$('td#check-out-coupon').html('- ' + format_price(coupon));	
		$("div#submit_cart input#discount").val( coupon );

		$('td#grand_total_ship').html('= ' + format_price(product_price + ship - coupon));

		$("div#submit_cart input#ship")
		.val( localStorage.getItem('ship') );

		// let string =  '<h5>Tổng Cộng: ' + format_price(result) + '</h5>';
		// $('div.grand-totall h5').html(string);
	}



	$("a#checkout").click(function(e){
		let ship        = htmlToNumber($fee.text());
		let address     = $('select.shipping_change option:selected').text();
		let coupon      = htmlToNumber($coupon.text());
		let coupon_name = $('div.discount-code input').val();
		
		if (checkInputOrdering(ship, 1)) {
			localStorage.setItem('ship', ship);
			localStorage.setItem('address', address);
			localStorage.setItem('coupon', coupon);
			localStorage.setItem('coupon_name', coupon_name);
			localStorage.setItem('back_cart', false);
		}
	});

	// Back FromCheckout to Cart
	let check_back = localStorage.getItem('back_cart');
	if ( check_back !== null && check_back !== '') localStorage.setItem('back_cart', false);

	$("a#back_cart").click(function(e){
		localStorage.setItem('back_cart', true);
	});

	if ( check_back == 'true' ) {
		let product_price = htmlToNumber($product_price.text() );
		let ship          = parseInt( localStorage.getItem('ship') );
		let coupon        = parseInt( localStorage.getItem('coupon') );
		let coupon_name   = localStorage.getItem('coupon_name');
		let string        = '<h5>Tổng Cộng: ' + format_price(product_price + ship - coupon) + '</h5>';

		if ( ship !== null && ship !== '' ) $fee.html(format_price( ship ));
		if ( coupon !== null && coupon !== '' ) $coupon.html(format_price( coupon ));

		$grandTotal.html(string);
		$("select.shipping_change").val(localStorage.getItem('ship'));
		$("div.discount-code input").val(coupon_name);
	}

	//
	// $("button#payment-3").click(function(e){
	// 	e.preventDefault();
	// 	alert(22);
	// });	

	// Coutinue Checkout Button
	let startIdButton = [3, 4, 5];
	$.each(startIdButton, function( index, result ) {
		// console.log(`index = ${index} - result = ${result}`);

		$(`button#payment-${result}`).click(function (e) {
			if (result == 4) {
				// alert(22);
				var payment_id = $("div.ship-wrapper input:radio[name=payment_id]:checked").val();
				$("div#submit_cart input#payment_id")
				.val( payment_id );
			}
			if (result == 5) {}

			let div         = $(`div#payment-${result}`);
			let nextDiv     = $(`div#payment-${result + 1}`);
			let showClass   = div.attr('class');
			let hiddenClass = showClass.replace(' show', '');
			div.removeClass(showClass).addClass(hiddenClass);
			nextDiv.addClass(showClass);
		});

		$(`a#payment-${result}`).click(function (e) {
			e.preventDefault();
			let div         = $(`div#payment-${result}`);
			let prevDiv     = $(`div#payment-${result - 1}`);
			let showClass   = div.attr('class');
			let hiddenClass = showClass.replace(' show', '');
			div.removeClass(showClass).addClass(hiddenClass);
			prevDiv.addClass(showClass);
		});

	})

	$("form[name=customer] button[type=submit]").click(function(e){
		// alert(22);
		e.preventDefault();

		$("div#submit_cart input#email")
		.val( $("form[name=customer] input[name=email]").val() );

		$("div#submit_cart input#name")
		.val( $("form[name=customer] input[name=name]").val() );

		$("div#submit_cart input#phone")
		.val( $("form[name=customer] input[name=phone]").val() );

		$("div#submit_cart input#address")
		.val( $("form[name=customer] input[name=address]").val() );
		
	});

	// Show Creadit Card
	$("input#creadit_card").click(function(){
	// 	$('div.toHide').show('slow');
		$('input#payment').val(2);
	});
	$("input#cash").click(function(){
	// 	$('div.toHide').hide();
		$('input#payment').val(1);
	});

	// Filter Search Category - Product
	$("button#search_product").click(function(){
		let searchValue = $('input[name=search_name]').val();
		if ( searchValue !== null ) {
			localStorage.setItem('search', searchValue);
		}

		let UrlPriceMin = getUrlParam('min');
		let UrlPriceMax = getUrlParam('max');
		if (
				UrlPriceMin !== null && UrlPriceMin !== '' && 
				UrlPriceMax !== null && UrlPriceMax !== ''
			) {

			$("form#search_name input[name=min]").val( UrlPriceMin );
			$("form#search_name input[name=max]").val( UrlPriceMax );
		} else {
			$("form#search_name input[name=min]").prop( "disabled", true );
			$("form#search_name input[name=max]").prop( "disabled", true );
		}
	});

	let UrlSearch   = getUrlParam('search_name');
	let searchValue = localStorage.getItem('search');
	if ( searchValue !== null && UrlSearch !== null) {
		$('input[name=search_name]').val(searchValue);
	}else{
		$('input[name=search_name]').val();
	}

	// Filter Search Price Min - Max Category - Product
	$("button#filter_price").click(function(e)
	{
		// alert('price');
		// let UrlSearch   = getUrlParam('search_name');
		if (UrlSearch == null || UrlSearch == '') {
			$( 'input[name=search_name]' ).prop( "disabled", true );
		}
		let search_price_min = parseInt( $search_price_min.val() );
		let search_price_max = parseInt( $search_price_max.val() );

		let setting_price_min       = parseInt(setting_price.min);
		let setting_price_min_plus  = parseInt(setting_price.min_plus);
		let setting_price_max       = parseInt(setting_price.max);
		let setting_price_max_minus = parseInt(setting_price.max_minus);
		// e.preventDefault();
	
		console.log('UrlSearch = ' + UrlSearch);
		// console.log('search_price_min = ' + search_price_min);
		// console.log('search_price_max = ' + search_price_max);
		// console.log('------');
		// console.log('setting_price_min = ' + setting_price_min);
		// console.log('setting_price_min_plus = ' + setting_price_min_plus);
		// console.log('setting_price_max = ' + setting_price_max);
		// console.log('setting_price_max_minus = ' + setting_price_max_minus);

		if ( search_price_min == setting_price_min && search_price_max == setting_price_max
				|| 
				(
					search_price_min*1000 == setting_price_min + setting_price_min_plus
				&& 
					search_price_max*1000 == setting_price_max - setting_price_max_minus 
				)
			) {
				// alert(11)
				$search_price_min.val( setting_price_min + setting_price_min_plus );
				$search_price_max.val( setting_price_max - setting_price_max_minus );
		} else {
			// alert(22)
			$search_price_min.val( search_price_min*1000 );
			$search_price_max.val( search_price_max*1000 );
		}
		// alert(33)

		// console.log('------');
		console.log('$search_price_min.val() = ' + parseInt( $search_price_min.val() ) );
		console.log('$search_price_max.val() = ' + parseInt( $search_price_max.val() ) );

		// e.preventDefault();
		let searchValue      = {
			'search_price_min': search_price_min,
			'search_price_max': search_price_max
		};
		console.log('XXXX search_price_min = ' + search_price_min);

		if ( search_price_min !== null && search_price_max !== null ){
			localStorage.setItem('search_price', JSON.stringify(searchValue));
		}
	})


	// $.each(userInfo, function( index, result ) {
	// 	console.log(`index = ${index} - result = ${result}`);
	// })

	if (login) {
		// console.log(userInfo);
		// console.log(userInfo.id);
	}else{
	}

	if (cartCheck) {
		$('div.cart-header').attr('hidden', false);
	}

	$('ul#product-attribute').css("list-style-type", "none");

	// allStorage();
});


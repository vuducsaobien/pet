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

	// Ship
	// if ( localStorage.getItem('ship') !== null) {
	// 	// localStorage.setItem('ship', null);
	// 	let ship = localStorage.getItem('ship');
	// 	console.log('ship = ' + ship);
	// 	$("input#ship").val(ship);
	// }	

	// Refreash Ship
	let shipDefine = localStorage.getItem('ship');
	if ( shipDefine !== null || shipDefine !== '' ) {
		console.log('shipDefine = ' + shipDefine);
		localStorage.setItem('ship', '');
		// $('span#fee').html('');
	}
	

	// Ship Change in Cart
	$('select.shipping_change').on("change", function(e) {
		e.preventDefault();
		let fee = parseInt($(this).val());
		console.log('fee = ' + fee);

		if (checkNumber(fee)) {
			let span                = $('span#grand_total span');
			let old_grandTotal_text = span.text();
			let currenciesAsNumbers = parseFloat( old_grandTotal_text.replace(/[^\d\.]/g,'') ) + '000';
			let grand_total         = parseInt(currenciesAsNumbers);
			let grand_total_ship    = grand_total + fee;
			let format              = format_price(grand_total_ship);
			let string              = '<h5>Tổng Cộng: ' + format + '</h5>';
			let selectValue         = $(this).val();

			console.log('fee = ' + fee);
			console.log('selectValue = ' + selectValue);

			$('div.grand-totall h5').html(string);
			$fee.html(format_price(fee));
			showNotify($fee, 'Đã Cập nhật Lại Giá Tiền');

			let   value = {
				'fee'             : fee,
				'grand_total'     : grand_total,
				'grand_total_ship': grand_total_ship,
				'selectValue'     : selectValue,
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
			let pri = $('span#grand_total span').text();
			pri = parseFloat( pri.replace(/[^\d\.]/g,'') ) + '000';
			pri = parseInt(pri);

			let string = '<h5>Tổng Cộng: ' + format_price(pri) + '</h5>';
			$('div.grand-totall h5').html(string);

		}
	});

	// Checkout Ship
	// let cart = localStorage.getItem('cart');
	// if (cart && shipDefine !== null || shipDefine !== '') 
	// {
	// 	let arrtest = JSON.parse(cart);
	// 	$.each(arrtest, function( index, result ) 
	// 	{
	// 		console.log(`---index = ${index} - result = ${result}`);

	// 		if (index == 'fee') {
	// 			$('p#check-out-fee').html('Phí vận chuyển : ' + format_price(result));
	// 			$('span#fee').html(format_price(result));
	// 			$('td#check-out-fee').html('+ ' + format_price(result));
	// 		}

	// 		if (index == 'grand_total_ship') {
	// 			$('td#grand_total_ship').html('= ' + format_price(result));
	// 			let string =  '<h5>Tổng Cộng: ' + format_price(result) + '</h5>';
	// 			$('div.grand-totall h5').html(string);
	// 		}

	// 		// if (index == 'selectValue') {
	// 		// 	$('select.shipping_change').val(result);
	// 		// }

	// 	})
	// }

	$("a#checkout").click(function(e){
		let currentElement = $(this);
		let url            = currentElement.data("url");
		let fee            = $('select.shipping_change').val();

		if (checkInputOrdering(fee, 1)) {
			// url = url.replace("default", fee)
			// console.log('ship = ' + ship);
			localStorage.setItem('ship', fee);
			// callAjax(null, url, 'ship');
			// $("input#ship").val(fee);
			// e.preventDefault();
		}
	});

	// Coutinue Checkout Button
	let startIdButton = [3, 4, 5, 6];
	$.each(startIdButton, function( index, result ) {
		// console.log(`index = ${index} - result = ${result}`);

		$(`button#payment-${result}`).click(function () {
			if (result == 6) {
				
			}
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

	// Show Creadit Card
	// $("input#creadit_card").click(function(){
	// 	$('div.toHide').show('slow');
	// 	$('input#payment').val(2);
	// });
	// $("input#cash").click(function(){
	// 	$('div.toHide').hide();
	// 	$('input#payment').val(1);
	// });

	// Filter Search Category - Product
	$("button#search_product").click(function(){
		let searchValue = $('input[name=search]').val();
		if ( searchValue !== null ) {
			localStorage.setItem('search', searchValue);
		}
	});

	let UrlSearch   = getUrlParam('search');
	let searchValue = localStorage.getItem('search');
	if ( searchValue !== null && UrlSearch !== null) {
		$('input[name=search]').val(searchValue);
	}

	// Filter Search Price Min - Max Category - Product
	$("button#filter_price").click(function(e, num){

		let search_price_min = $('input[name=min]').val();
		let search_price_max = $('input[name=max]').val();
		let searchValue      = {
			'search_price_min': search_price_min,
			'search_price_max': search_price_max
		};

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


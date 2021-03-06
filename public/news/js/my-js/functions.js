function showNotify(element, message, type = 'success') {
    element.notify(message, {
        position : "bottom center",
        className: type,
    });
}

function allStorage() {

    var archive = [],
        keys = Object.keys(localStorage),
        i = 0, key;

    for (; key = keys[i]; i++) {
        archive.push( key + '=' + localStorage.getItem(key));
    }

	// $.each(archive, function (key, param) {
	// 	console.log(`key = ${key} -- param = ${param}`);
	// });
	console.log('all localStorage = ' + archive);

    return archive;
}

// A.Check Type of Number - Dad
function checkInputOrdering(number, higher) {
    flag = true;
    if (!checkInteger(number)) flag = false;
    if (!checkNumber(number)) flag = false;
    if (!checkNumberHigher(number, higher)) flag = false;
    return flag;
}

// B.Check Type of Number - Child
function checkInteger(number){
    let flag;
    if(number % 1 == 0) {flag = true;}else{flag = false;}
    return flag;
}
function checkNumber(number){
    let flag;
    if($.isNumeric(number)) {flag = true;}else{flag = false;}
    return flag;
}
function checkNumberHigher(number, higher){
    let flag;
    if(number >= higher) {flag = true;}else{flag = false;}
    return flag;
}

function callAjax(element, url, type) {

	$.ajax({
		url       : url,
		type      : "GET",
		dataType  : "json",
		statusCode: 
		{
			500: function() {
				console.log('500');

				switch (type) {
					case 'coupon':
						// Calculator Again Grand Total
						$coupon.html(format_price(0) );
						let product_price = htmlToNumber($product_price.text());
						let ship          = htmlToNumber($fee.text());
						let format        = format_price(product_price + ship);
						let string        = '<h5>Tổng Cộng: ' + format + '</h5>';
						$grandTotal.html(string);
						showNotify($grandTotal, 'Đã Cập nhật Lại Giá Tiền');
					break;
				}
			}
		},
		success   : function (result) {
			// console.log(result);
			
			if (result) {
				switch (type) {

					case 'modal':
						console.log(result);

						// Add Name
						$(".qwick-view-content h3").html(result.name);

						// Add Rating
						let htmlRating = $("div.product-rating");
						if (htmlRating.children().length > 0 ) htmlRating.children().remove();

						htmlRating.append( showRating(result.comment) );
						

						// Add Price
						let xhtml = format_html_price(result.price, result.price_until);
						$("div#product_price").html(xhtml);
						$("div#product_price").data('price', result.price_until);

						// Add Short Description
						let short = $(".qwick-view-content div.product-short-description");
						short.html(result.short_description);
						if ( short.next().is('br') ){
						}else{
							$("<br>").insertAfter(short);
						}

						// Add Attribute Product
						let attribute = $(".qwick-view-content div.quick-view-select");
						if (attribute.children().length > 0 ) {
							attribute.children().remove();
						}

						let select = selectBox(result.attribute, result.list_attribute);
						attribute.append(select);

						// console.log(result.attribute);
						// console.log(result.list_attribute);

						// Add Image
						// console.log(result.list_images);
						let images_big       = $("div.quick-view-tab-content");
						let images_small     = $("div.quick-view-list");
						let xhtmlImage_big   = '';
						let xhtmlImage_small = '';

						$.each(result.list_images, function( key, val ) {
							// console.log(`key = ${key} - param = ${val.name}`);
							// console.log(`key = ${key} - param = ${val.alt}`);

							// Remove Modals Before
							if (images_big.children().length > 0 ) images_big.children().remove();
							if (images_small.children().length > 0 ) images_small.children().remove();
	
							if ( key == 0 ) {

								xhtmlImage_big += `
									<div class="tab-pane active show fade" id="modal1" role="tabpanel">
										<img src="${asset + val.name}" alt="${val.alt}" style="width: 80%; height: 15%"/>
									</div>
								`;

								xhtmlImage_small += `<a class="active" href="#modal1" data-toggle="tab" style="width: 100px; height: 112px">
										<img src="${asset + val.name}" alt="${val.alt}" style="width: 100%; height: 90%"/>
									</a>
								`;

							} else {

								xhtmlImage_big += `
									<div class="tab-pane fade" id="modal${key + 1}" role="tabpanel">
										<img src="${asset + val.name}" alt="${val.alt}" style="width: 80%; height: 15%"/>
									</div>
								`;

								xhtmlImage_small += `
									<a href="#modal${key + 1}" data-toggle="tab" role="tab" style="width: 100px; height: 112px">
										<img src="${asset + val.name}" alt="${val.alt}" style="width: 100%; height: 90%"/>
									</a>
								`;

							}

						});

						images_big.append(xhtmlImage_big);
						images_small.append(xhtmlImage_small);

					break;

					case 'cart':
						// SHow success message
						let cartIcon = $('span.count-style');
						let count    = parseInt(cartIcon.text());
						    result   = parseInt(result);

						if ( count > 0 ) {
							cartIcon.html(result + count);
						} else {
							cartIcon.html(result);
						}

						showNotify(cartIcon, `Đã thêm ${result} SP vào Giỏ hàng`);
					break;

					case 'coupon':
						console.log(result);
						console.log(result.type);

						let product_price = htmlToNumber($product_price.text());
						let ship          = htmlToNumber($fee.text());
						let grand_total   = product_price + ship;
						
						// Subtraction Grand_Total
						let minus;
						if ( result.type == 'percent' ) {
							minus = result.value * grand_total / 100;
							$coupon.html(format_price(minus) );
					
						} else if(result.type == 'price') {
							$coupon.html(format_price(result.value) );
							minus = result.value;
						}else{
							showNotify($fee, 'Đã Cập nhật Lại Giá Tiền');
							$coupon.html(format_price(0) );
							break;
						}

						// Edit Grand Total
						let format      = format_price(grand_total - minus);
						let string      = '<h5>Tổng Cộng: ' + format + '</h5>';
						$grandTotal.html(string);

						showNotify($grandTotal, 'Đã Cập nhật Lại Giá Tiền');
						console.log('minus = ' + minus);

					break;

				}
			} else {
				// console.log('fail');
			}
		},
	});
}

function format_html_price(price, price_until){
	price_until = format_price(price_until);
	price       = format_price(price);

	if (price_until < price) {
		xhtml = `
			<span class="new">${price_until}</span>
			<span class="old">${price}</span>
		`;
	}else{
		xhtml = `<span class="new">${price_until}</span>`;
	}

	return xhtml;
}

function format_price(price, type = 'vietnam', comma = '.', decimal = 0){
	let result = price.toFixed(decimal).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, `$1${comma}`);

	switch (type) {
		case 'vietnam':
			return result + ' <u>đ</u> ';
			break;
		case 'america':
			return ' $ ' + result;
			break;
		default:
			return result + ' <u>đ</u> ';
			break;
	}

}

function htmlToNumber($element){
	return parseInt(parseFloat($element.replace(/[^\d\.]/g,'') ) + '000');
}

function selectBox(attribute, list_attribute){

	let xhtml = '';
	$.each(attribute, function( key, val ) {
		// console.log('val.id = ' + val.id);

		$.each(list_attribute, function( index, result ) {
			
			if (val.id == index) {
				let product_id = localStorage.getItem('product_id');

				xhtml += `
				<div class="select-option-part">
					<label>${val.name}*</label>
					<select name="attribute_${index}" data-attribute-id=${index} data-product-id=${product_id} class="select">
						<option value="default">- Please Select ${val.id} -</option>
				`;

				$.each(list_attribute, function( index, result ) {
					// console.log(`index = ${index} - result = ${result}`);

					$.each(result, function( indexChild, resultChild ) {
					// console.log(`key = ${indexChild} - param = ${resultChild}`);

						if (val.id == index) {
							xhtml += `<option value="${resultChild.value}">${resultChild.value}</option>`;
						}else{
							return false;
						}

					});

				});

				xhtml += `
					</select>
				</div>
				`;

			}
			// else{
			// 	xhtml = '<br><br><br><br><br><br><br><br><br><br><br><br><br>'
			// }
		});

	});

	return xhtml;
}

function getUrlParam(key) {
    let searchParams = new URLSearchParams(window.location.search);
    return searchParams.get(key);
}

function showRating($rating)
{
	let $xhtml;
	$rating = parseInt($rating);
	if ( checkNumber($rating) && checkInteger($rating) ) {
		$tru = 5 - $rating;
		$xhtml = '';
		for ($i = 0; $i < $rating; $i++) {
			$xhtml += '<i class="ti-star theme-color"></i>';
		}

		for ($i = 0; $i < $tru; $i++) {
			$xhtml += '<i class="ti-star"></i>';
		}
	}

	return $xhtml;

}


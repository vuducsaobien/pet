function showNotify(element, message, type = 'success') {
    element.notify(message, {
        position: "top center",
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
		url: url,
		type: "GET",
		dataType: "json",
		success: function (result) {
			// console.log(result);
			
			if (result) {
				switch (type) {

					case 'modal':
						// console.log(result);

						// Add Name
						$(".qwick-view-content h3").html(result.name);

						// Add Price
						let xhtml = format_html_price(result.price, result.price_sale, result.sale);
						$("div#product_price").html(xhtml);
						$("div#product_price").data('price', result.price_sale);

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
						let bigImage = $(".quick-view-tab-content");
						let smallImage = $(".quick-view-list nav");
						let xhtmlImage = '';
						$.each(result.list_images, function( key, val ) {
							// console.log(`key = ${indexChild} - param = ${resultChild}`);
							xhtmlImage += `
								<a class="active" href="#modal1" data-toggle="tab">
									<img src="{{ URL::asset('news/images/quick-view/s1.jpg') }}" alt="" style="width: 100%; height: 100%"/>
								</a>
							`;
							// '{{ URL::asset('/images/flags/') }}'
						});
						// smallImage.append(xhtmlImage);
		

						//<div class="tab-pane active show fade" id="modal1" role="tabpanel">
						//	<img src="{{ asset('/images/quick-view/l1.jpg') }}" alt="">
						//</div>

						//<div class="tab-pane fade" id="modal2" role="tabpanel">
						//	<img src="{{ asset('/images/quick-view/l2.jpg') }}" alt="">
						//</div>

						//<a class="active" href="#modal1" data-toggle="tab">
						//	<img src="{{ asset('/images/quick-view/s1.jpg') }}" alt="" style="width: 100%; height: 100%"/>
						//</a>

						//<a href="#modal2" data-toggle="tab" role="tab">
						//	<img src="{{ asset('/images/quick-view/s2.jpg') }}" alt="" style="width: 100%; height: 100%"/>
						//</a>
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
	

	
				}
			} else {
				console.log('fail');
			}
		},
	});
}

function format_html_price(price, price_sale, sale=0){
	price_sale = format_price(price_sale);
	xhtml = `<span class="new">${price_sale}</span>`;

	if (sale > 0) {
		price = format_price(price);
		xhtml += `<span class="old">${price}</span>`;

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

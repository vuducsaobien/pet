function showNotify(element, message, type = 'success') {
    element.notify(message, {
        position: "bottom center",
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
function checkNumberHigher(number, higher=0){
    let flag;
    if(number >= higher) {flag = true;}else{flag = false;}
    return flag;
}

function regex(data, type){
	let regex;
	let result;

	switch (type) {
		case 'iiiii': 
			
		break;
	
		default:
			// 1,200,0ds,awd,dad, ds,ad ,dad => 12000dsawddaddsaddad
			// 6 % => 6
			regex = /[^A-Z0-9]/ig;
		break;
	}

	result = data.replace(regex, "");
	return result;
}

function clearOppersiteInput(element1, element2) {
	element1.click(function (e) {
		element2.val('');
	})
	element2.click(function (e) {
		element1.val('');
	})
}


function callAjax(element, url, type,data='') {

	data={'data':data}

	$.ajax({
		url     : url,
		type    : "GET",
		data    : data,
		dataType: "json",
		success : function (result) {
			console.log(result);
			
			if (result) {
				switch (type) {
					case 'ordering':
						if ($('td[class^=modified-]').length) {
							$(".modified-" + result.id).html(result.modified);
						}
						showNotify(element, result.message);
						break;
						
					case 'status':
						// console.log(result);
						
						$(".modified-" + result.id).html(result.modified);
						element.text(result.status.name);
						element.removeClass(element.data('class'));
						element.addClass(result.status.class);
						element.data('class', result.status.class);
						element.attr("href", result.link);
						showNotify(element, result.message);
						break;

					case 'ishome':
						// console.log(result);
						
						element.text(result.ishome.name);
						element.removeClass(element.data('class'));
						element.addClass(result.ishome.class);
						element.data('class', result.ishome.class);
						element.attr("href", result.link);
						showNotify(element, result.message);
						break;
	
					case 'select':
						$(".modified-" + result.id).html(result.modified);
						showNotify(element, result.message);
						break;

				}
			} else {
				console.log('fail');
			}
		},
	});
}

function makeid(length) {
	var result = '';
	var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	var charactersLength = characters.length;
	for (var i = 0; i < length; i++) {
		result += characters.charAt(Math.floor(Math.random() * charactersLength));
	}
	return result;
}



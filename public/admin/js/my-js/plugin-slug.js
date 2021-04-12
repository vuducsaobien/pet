$(document).ready(function() {
	
	if( controllerName == 'article' || 
		controllerName == 'category' ||
		controllerName == 'product' ||
		controllerName == 'recruitment' 

	){

		$.slugify("Ätschi Bätschi"); // "aetschi-baetschi"
		$('#slug').slugify('#name'); // Type as you slug

	}

});


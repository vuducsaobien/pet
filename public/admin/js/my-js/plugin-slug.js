$(document).ready(function() {
	
	if( controllerName == 'article' || 
		controllerName == 'category' ||
		controllerName == 'product' 

	){

		$.slugify("Ätschi Bätschi"); // "aetschi-baetschi"
		$('#slug').slugify('#name'); // Type as you slug

	}

});


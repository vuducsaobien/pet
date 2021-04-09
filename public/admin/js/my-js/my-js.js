$(document).ready(function() {
	// RANDOM COUPON CODE
	let code = makeid(10);
	$('#code').attr('value', code);

	$('#random-code').on('click', () => {
		let code = makeid(10);
		$('#code').attr('value', code);
		// console.log(code);
	});
	
	// allStorage();
});


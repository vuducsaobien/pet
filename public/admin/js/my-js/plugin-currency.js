$(document).ready(function() {
	/* ---------- Currenrcy - Percent ---------- */
	
	if( controllerName == 'discount' )
	{
		// Currency
		$currency.simpleMoneyFormat();
		$accepted_min.simpleMoneyFormat();
		$accepted_max.simpleMoneyFormat();

		// Percent
		$percent.change(function() {
			$(this).val(function(index, old) { return old.replace(/[^0-9]/g, '') + ' %'; });
		});

		// Disable Currency & Percent
		clearOppersiteInput($currency, $percent);

		// Clear Input Special Character
		$submit.click(function (e) {
			let newCurrency    = parseInt( regex($currency.val()) );
			let newPercent     = parseInt( regex($percent.val()) );
			let newAcceptedMin = parseInt( regex($accepted_min.val()) );
			let newAcceptedMax = parseInt( regex($accepted_max.val()) );

			if ( !isNaN(newCurrency) )	 	$currency.val(newCurrency);
			if ( !isNaN(newPercent) ) 		$percent.val(newPercent);
			if ( !isNaN(newAcceptedMin) ) 	$accepted_min.val(newAcceptedMin);
			if ( !isNaN(newAcceptedMax) ) 	$accepted_max.val(newAcceptedMax);

			if ( 	!(
						checkInputOrdering(newCurrency) 	|| 
						checkInputOrdering(newPercent) 		|| 
						checkInputOrdering(newAcceptedMin) 	|| 
						checkInputOrdering(newAcceptedMax) 	|| 
						newCurrency < 0						||
						newPercent < 0						||
						newPercent > 100					||
						newAcceptedMin < 0 					||
						newAcceptedMax < 0					||
						newAcceptedMin >= newAcceptedMax
					)
				){
					// alert('Có Lỗi về Number !!');
					// e.preventDefault();
			}
		})
	}

	if( controllerName == 'shipping' )
	{
		// Currency
		$currency.simpleMoneyFormat();

		// Clear Input Special Character
		$submit.click(function (e) {
			let newCurrency = parseInt( regex($currency.val()) );

			if ( !isNaN(newCurrency) ) {
				$currency.val(newCurrency);
			}
			
			if ( 	!(
						checkInputOrdering(newCurrency)
					)
				){
					e.preventDefault();
			}
			
		})
	}

	if( controllerName == 'product' )
	{
		// Currency
		$currency.simpleMoneyFormat();

		// Percent
		$percent.change(function() {
			$(this).val(function(index, old) { return old.replace(/[^0-9]/g, '') + ' %'; });
		});

		// Disable Currency & Percent
		clearOppersiteInput($price_sale, $percent);

		// Calculator Until Price
		$('input[name=price_sale], input[name=sale], input[name=price]').change(function(){
			    priceVal    = parseInt( regex( $price.val() ) );

			if ( $price_sale.val() !== '' ) {
	
				let price_sale = $price_sale.val();
				    price_sale = parseInt( regex(price_sale) );
	
				$price_until.val(priceVal - price_sale);
				$price_until.simpleMoneyFormat();

			}else{
				let percent = $percent.val();
				    percent = parseInt( regex(percent) );
				$price_until.val(priceVal * (100 - percent) / 100 );
				$price_until.simpleMoneyFormat();
			}	
		})
		
		// Clear Input Special Character
		$submit.click(function (e) {

			let newPrice = parseInt( regex($price.val() ) );
			if ( !isNaN(newPrice) ) $price.val(newPrice);

			let newPriceUntil = parseInt( regex($price_until.val() ) );
			if ( !isNaN(newPriceUntil) ) $price_until.val(newPriceUntil);
			$price_until.attr("disabled", false);

			if ( $price_sale.val() !== '' ) {
				let newPriceSale  = parseInt( regex($price_sale.val() ) );
				if ( !isNaN(newPriceSale) ) $price_sale.val(newPriceSale);

			}else{
				let newPercent  = parseInt( regex($percent.val()) );
				if ( !isNaN(newPercent) ) $percent.val(newPercent);
			}

			
		})
	}



	// allStorage();
});


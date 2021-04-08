$(document).ready(function() {
	/* ---------- Currenrcy - Percent ---------- */
	
	if( controllerName == 'discount' )
	{
		// Currency
		$currency.simpleMoneyFormat();
		$accepted.simpleMoneyFormat();

		// Disable Currency & Percent
		clearOppersiteInput($currency, $percent);

		// Clear Input Special Character
		$submit.click(function (e) {
			let newCurrency = parseInt( regex($currency.val()) );
			let newPercent  = parseInt( regex($percent.val()) );
			let newAccepted = parseInt( regex($accepted.val()) );

			if ( !isNaN(newCurrency) ) {
				$currency.val(newCurrency);
			}
			
			if ( !isNaN(newPercent) ) {
				$percent.val(newPercent);
			}

			if ( !isNaN(newAccepted) ) {
				$accepted.val(newAccepted);
			}

			if ( 	!(
						checkInputOrdering(newCurrency) || 
						checkInputOrdering(newPercent) ||
						checkInputOrdering(newAccepted)
					)
				){
					e.preventDefault();
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


	// allStorage();
});


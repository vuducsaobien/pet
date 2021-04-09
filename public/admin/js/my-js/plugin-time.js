$(document).ready(function() {
	let time_start = 'DD-MM-YYYY HH:mm:ss';
	let longDateFormat = 'dd/MM/yyyy HH:mm:ss';
	
	if( controllerName == 'discount' )
	{
		$date_start.datetimepicker({
			defaultDate: $.now(),
			format     : time_start,
		});		

		$date_end.datetimepicker({
			defaultDate: $.now(),
			format     : time_start,
		});		

		// Clear Input Special Character
		$submit.click(function (e) {

			// Update New Time Format
			let old_start_date = $date_start.val();
			let newdate_start  = $.format.date(old_start_date, longDateFormat);
			$date_start.val(newdate_start);

			let old_end_date = $date_end.val();
			let newdate_end  = $.format.date(old_end_date, longDateFormat);
			$date_end.val(newdate_end);

		})
	}

	if( controllerName == 'comment' )
	{
		// Format when Add
		$created.datetimepicker({
			defaultDate: $.now(),
			format     : time_start,
		});		

		// Clear Input Special Character
		$submit.click(function (e) {

			// Format when Submit
			let old_start_date = $created.val();
			let newdate_start  = $.format.date(old_start_date, longDateFormat);
			$created.val(newdate_start);

		})
	}


});


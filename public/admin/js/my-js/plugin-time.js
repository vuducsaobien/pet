$(document).ready(function() {
	
	if( controllerName == 'discount' )
	{

		let time_start = 'DD-MM-YYYY HH:mm:ss';

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
			var longDateFormat = 'dd/MM/yyyy HH:mm:ss';
			let old_start_date = $date_start.val();
			let newdate_start  = $.format.date(old_start_date, longDateFormat);
			$date_start.val(newdate_start);

			let old_end_date = $date_end.val();
			let newdate_end  = $.format.date(old_end_date, longDateFormat);
			$date_end.val(newdate_end);

		})
	}

});


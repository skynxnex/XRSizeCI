$(document).ready(function() {
	
	$('.carousel').carousel();
	
	$('.elasticinput').elastic();

	$("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });

	$('#adde').validate({
		rules: {
			datepicker: {
				required: true,
				date: true,
				dpDate: true
			}
		},
		messages: {
			validFormatDatepicker: 'Datumet är ogiltigt'
		}
	});
	
	$('.clickable').confirm({
		timeout:3000,
		dialogShow:'fadeIn',
		dialogSpeed:'slow',
		buttons: {
			wrapper:'<button></button>',
			separator:'  '
		}  
	});
});

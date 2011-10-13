$(document).ready(function() {
	
	$("#slider").easySlider({
		auto: true,
		continuous: true,
		numeric: true,
		speed: 1000,
		pause: 8000
	});
	
	$('.elasticinput').elastic();
	
	jQuery.each(jQuery.browser, function(i, val) {
		if(i == 'webkit') {
			$('#ul > ul > li > img').css('height', '4%');
		}
    });

	$("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#loginform").validate();
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
	
	$("#newpass").validate({
		rules: {
			pwd: {
				required: true,
				minlength: 6
			},
			pwdval: {
				equalTo: "#pwd"
			}
		}
	});
	
	$("#editprofile").validate({
		rules: {
			email: {
				email: true
			}
		}
	});
});

$(document).ready(function() {
	
	$('#miniEvent').load('/event/miniEvent');
	var refreshMini = setInterval(
	  	function() {
	  		$.ajax({
  				url: "/event/getLastEvent",
  				dataType: 'json',
  				success: function(data) {
   					miniUpdate(data);	
  				}
			});
		}, 
	10000);

	var refreshList = setInterval(
	  	function() {
	  		$.ajax({
  				url: "/event/getLastEvent",
  				dataType: 'json',
  				success: function(data) {
   					updateEvents(data);	
  				}
			});
		}, 
	10000);

	function updateEvents(data) {
		var divId = $('#lastevents div:first').attr('id');
		if(data.id > divId) {
			var info = '<div class="span5 well"><p>'+data.name+' '+data.date+'</p></div><div class="divider"></div>';
			$('#lastevents').prepend($(info).hide().fadeIn(3000));
			var lastDiv = $('#lastevents div:last').siblings().last();
			if(lastDiv.hasClass("divider")) {
				lastDiv.remove();
				lastDiv = $('#lastevents div:last').siblings().last();
			}
			lastDiv.fadeOut(3000, function() { $(this).remove() });
		} 
	}

	function miniUpdate(data) {
		var spanid = $('#miniEvent span').attr('id');
		spanid = spanid.replace('mini', '');
		console.log(spanid);
		if(data.id > spanid) {
			$('#miniEvent').fadeOut(2000, function() {
				$(this).html('Senaste: '+data.name+' körde '+data.time+'min '
				+data.ename+'<span id="mini'+data.id+'"></span>')
				.fadeIn(2000);
			});
		}
	}

   $.ajaxSetup({ cache: false });

	
	$('.carousel').carousel();
	
	$('.elasticinput').elastic();

	$('.clickable').confirm({
		timeout:3000,
		dialogShow:'fadeIn',
		dialogSpeed:'slow',
		buttons: {
			wrapper:'<button></button>',
			separator:'  '
		}  
	});
	
	var time = $('#time option:selected').attr('value');
	$("#time").hide();
	// var select = $( "#time" );
	$("#slider").slider({
		max: 90,
		min: 30,
		step: 5,
		value: $( "#time option:selected").text(),
		slide: function(event, ui) {
			time = ui.value;
		},
		stop: function(event, ui) {
			console.log(ui.value);
			$('#time').find('option:selected').removeAttr('selected');
			$('#time option[value='+ui.value+']').attr('selected', 'selected');
		}
	});
	
	$('.ui-slider-handle').hover(
		function(e) {
			var values = $(".ui-slider-handle").offset();
			var width = $(".ui-slider-handle").width();
			var height = $(".ui-slider-handle").height();
			var leftVal = values.left + 5; 
			var topVal = values.top - 40;
			
			$('#output_time').html('<span>'+time+'</span>').show().css({left:leftVal,top:topVal});
		},
		function() {
			$('#output_time').hide();
		}
	);
	
	$('#year').hide();
	$('#month').hide();
	$('#day').hide();
	$.datepicker.regional[ "se" ] ;
	$('#datepicker').datepicker({
		dateFormat: "yy-mm-dd",
		defaultDate: new Date($('#year option:selected').val(), $('#month option:selected').attr('value') -1, $('#day option:selected').val()),
		showButtonPanel: true,
		showOtherMonths: true,
		onSelect: function(text) {
			var date = text;  
			var elem = date.split('-');
			day = elem[2];  
			$('#day').find('option:selected').removeAttr('selected');
			$('#day option[value='+day+']').attr('selected', 'selected');
			month = elem[1];
			
			$('#month').find('option:selected').removeAttr('selected');
			$('#month option[value='+month+']').attr('selected', 'selected');
			year = elem[0];
			$('#year').find('option:selected').removeAttr('selected');
			$('#year option[value='+year+']').attr('selected', 'selected');
		}
	});
	
	$('#user_name').keyup(function() {
		if($(this).val() == '') {
			$('#fieldset_username').removeClass('success');
			$('#fieldset_username').removeClass('error');
		} else {
			$.post("http://xrsize.dev/user/username_check", 
			{ user_name: $(this).val() },
	        function(data) {
	        	// console.log(data.returnvalue);
	        	if(data.returnvalue == true) {
					$('#fieldset_username').removeClass('error');
	        		//$('#namecheck').html('Namnet finns inte än');
	        		$('#fieldset_username').addClass('success');
	        	} else {
	        		$('#fieldset_username').removeClass('success');
	        		// $('#namecheck').html('Namnet finns!');     
	        		$('#fieldset_username').addClass('error');        		
	        	}
	        }, "json");     
		}
	});
	
	$('#email').keyup(function() {
		if($(this).val() == '') {
			$('#fieldset_email').removeClass('success');
			$('#fieldset_email').removeClass('error');
		} else {
			$.post("http://xrsize.dev/user/email_check", 
			{ email: $(this).val() },
	        function(data) {
	        	// console.log(data.returnvalue);
	        	if(data.returnvalue == true) {
					$('#fieldset_email').removeClass('error');
	        		//$('#namecheck').html('Namnet finns inte än');
	        		$('#fieldset_email').addClass('success');
	        	} else {
	        		$('#fieldset_email').removeClass('success');
	        		// $('#namecheck').html('Namnet finns!');     
	        		$('#fieldset_email').addClass('error');        		
	        	}
	        }, "json");     
		}
	});
	
	$('#create_user').validate({
		rules: {
			email: {
				required: true,
				email: true
			}
		}
	});
});

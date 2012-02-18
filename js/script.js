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

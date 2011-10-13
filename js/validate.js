 $(document).ready(function(){
 
	$("#newpass").validate({
		rules: {
			pwd: {
				required: true,
				minlength: 6
			},
			pwdval: {
				equalTo: "#pwd"
			}, 
			email: {
				email: true
			},
			date: {
				date: true
			}
		}
	});
});
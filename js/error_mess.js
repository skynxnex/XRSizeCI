$(function() {
	jQuery.extend(jQuery.validator.messages, {
		required: "Fältet kan inte vara tomt.",
		remote: "Please fix this field.",
		email: "Epost adressen är ogiltig",
		url: "Please enter a valid URL.",
		date: "Felaktigt daturmformat.",
		dateISO: "Please enter a valid date (ISO).",
		number: "Please enter a valid number.",
		digits: "Please enter only digits.",
		creditcard: "Please enter a valid credit card number.",
		equalTo: "Fälten är inte lika.",
		accept: "Please enter a value with a valid extension.",
		maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
		minlength: jQuery.validator.format("Måste vara minst {0} tecken."),
		rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
		range: jQuery.validator.format("Please enter a value between {0} and {1}."),
		max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
		min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
	});
});
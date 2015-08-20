jQuery(document).foundation();


$( document ).ready(function () {
	$("#register-button").click(function () {
		$(".register-form").show();
	});

	if ($('#register-button')) {
		var color = $('#register-button').css('background-color');
		$('#walker-icon').css('color', color);
	};


});


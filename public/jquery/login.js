$(document).ready(function() {

$('.open_loginbox').click(function() {
	$('.login_box').slideToggle('fast');
});

$('.login_button').click(function(e) {

	var username = $('.login_textfield').val();
	if (username == '') 
	{
		$('.login_textfield').css("background-color", "#f9becc");
		e.preventDefault();
    	return false; 
	}

});

});

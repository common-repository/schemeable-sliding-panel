jQuery(document).ready(function($) {

    $('#sliding-panel').detach().prependTo('body');

    $('#sliding-panel, #open, #close, #toggle a, #lost-pwd, #login-again, #sliding-registerform, #sliding-loginform, #lostpassword-form').bind('click', function(e) {
        $('#register-message').html('');
        $('#lostpwd-message').html('');
        $('#login-message').html('');
        return true ;
    });

    // Expand Panel
	$("#open").click(function(){
		$("div#panel").slideDown("slow");
        return false ;
	});

	// Collapse Panel
	$("#close").click(function(){
		$("div#panel").slideUp("slow");
        return false ;
	});

	// Switch buttons from "Log In | Register" to "Close Panel" on click
	$("#toggle a").click(function () {
		$("#toggle a").toggle();
        return false ;
	});

    $('#lost-pwd').bind('click', function() {
        $('#lostpassword-form').css('display', 'block');
        $('#login-form').css('display', 'none');
        return false ;
    });

    $('#login-again').bind('click', function() {
        $('#lostpassword-form').css('display', 'none');
        $('#login-form').css('display', 'block');
        return false ;
    });

    $('#sliding-registerform').bind('submit', function(event) {
        event.preventDefault();
        user_login = $('#user_login').val();
        user_email = $('#user_email').val();
        url = $('#sliding-registerform').attr('action');
        params = {
            'user_login': user_login,
            'user_email': user_email,
            'wp-submit': 'Register',
            'redirect_to': ''
        };
        $.post(url, params, function(response) {
            if(response.success) {
                $('#register-message').html('<span class="login-success">' + response.message + '</span>');
                $('#user_login').val('');
                $('#user_email').val('');
            }
            else
                $('#register-message').html('<span class="login-failure">' + response.message + '</span>');
        }, 'json');
        return false ;
    });

    $('#sliding-loginform').bind('submit', function(event) {
        event.preventDefault();
        user_login = $('#log').val();
        user_password = $('#pwd').val();
        rememberme = $('#rememberme').val();
        redirect = $('#redirect_to').val();
        params = {
            'log': user_login,
            'pwd': user_password,
            'rememberme': rememberme,
            'redirect': redirect
        };
        url = $('#sliding-loginform').attr('action');
        $.post(url, params, function(response) {
            if(response.success) {
                $('#login-message').html('<span class="login-success">' + response.message + '</span>');
                window.location.reload();
            }
            else
                $('#login-message').html('<span class="login-failure">' + response.message + '</span>');
        }, 'json');
        return false ;
    });

    $('#lostpasswordform').bind('submit', function(event) {
        event.preventDefault();
        user_login = $('#name_email').val();
        params = {
            'user_login': user_login
        };
        url = $('#lostpasswordform').attr('action');
        $.post(url, params, function(response) {
            if(response.success) {
                $('#lostpwd-message').html('<span class="login-success">' + response.message + '</span>');
            }
            else
                $('#lostpwd-message').html('<span class="login-failure">' + response.message + '</span>');
        }, 'json');
        return false ;
    });

});

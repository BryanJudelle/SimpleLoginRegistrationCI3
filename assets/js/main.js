requirejs.config({
	/* 
		configure boostrap using shim 
	*/
	shim: {
		"bootstrap" : { "deps" :['jquery']}
	},
	/*
		Path definition:
			this include all the path of dependency javascript
	*/
	paths: {
		jquery      : '../js/jquery-1.11.3.min',
		bootstrap   : '../js/bootstrap.min',
		login       : '../js/modules/loginModule',
		register    : '../js/modules/registerModule',		
	}
});

requirejs(["login", "register", "bootstrap"]);
require(["jquery"], function ($) {
	$(function() {
	    $('#login-form-link').click(function(e) {
	    	$('.help-block').remove();
			$('.has-error').removeClass('has-error');
			$("#login-form").delay(100).fadeIn(100);
	 		$("#register-form").fadeOut(100);
			$('#register-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
		$('#register-form-link').click(function(e) {
			$('.help-block').remove();
			$('.has-error').removeClass('has-error');
			$("#register-form").delay(100).fadeIn(100);
	 		$("#login-form").fadeOut(100);
			$('#login-form-link').removeClass('active');
			$(this).addClass('active');
			e.preventDefault();
		});
	});
});
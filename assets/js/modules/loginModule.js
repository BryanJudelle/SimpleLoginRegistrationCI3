/*
	MODULE: initialized
		this modules contains all initialization process for pawning page.
		this is a pre-process module.
*/
define(["jquery", "bootstrap"], function($, bootstrap) {

	var LoginModule = (function() {

		init = function() {
			$('#btn-login').on('click', function(e) {
				var u = $('#username').val(),
			   		p = $('#password').val();
				submit_request(u,p);
				e.preventDefault();
			});
		},

		hide_modal = function() {
			$('#myModal').modal('hide');
			return window.location = login_path + "index.php/profile";
		},

		submit_request = function(user, pass) {
			$.ajax({
			        type : 'POST',
			        url : login_path + 'index.php/welcome/login',
			        data : { username: user, password: pass },
			        dataType : 'json',
			        async: true,
			        cache: false,
					beforeSend : function() {
			            $('#btn-login').html('Please wait <i class="fa fa-refresh fa-spin"></i>');
			            $('#btn-login').addClass('disabled');
			        },
			        success : function(response) {
						$('#btn-login').html('login');
			            $('#btn-login').removeClass('disabled');			        	
			        	if (response.message === "success") {
							$('#myModal').modal('show');
							window.setTimeout(hide_modal, 3400);
			        	}
			        	else {
			        		$('#warning-notify').removeClass('hide');
							$('#msg-notify').text(response.content);
			        	}
				    },
			    });
			return false;
		};

		return {init: init};
	})();

	LoginModule.init();
});
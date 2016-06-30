/*
* registerModule.js
*	Contains all registration-related code.
*
* @author: Bryan Judelle Ramos
* @email: bjmramos@gmail.com
**/
define(["jquery"], function($) {

	var RegisterModule = (function() {

		/*
		* TO DO:
		*	initialized all dom requirements, do event-triggered functionality.
		*   
		*/
		init = function() {
			/* dont allow any keys to be accepted except on numeric keys and backspace, tab and return etc..
			 * bind it on keydown event.
			 */
			 $("#reg-age").on('keydown', function (e) {
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
		            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 return;
		        }
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }
		    });

			$('#btn-register').on('click', function(e) {
				validateReqdField();
				submit_request_registration();
				e.preventDefault();
				
			});
		},

		/*
		* TO DO:
		* 	validate required fields, check if the field is empty.
		*   return error message.
		*/
		validateReqdField = function() {
			$('.help-block').remove();
			$('.has-error').removeClass('has-error');
			$('.required').filter(function (){ 
            	 return this.value === "";
        	 }).after('<div class="help-block">Enter a value</div>').parent().addClass('has-error');
		},

		hide_modal = function() {
			$('#myModal').modal('hide');
			return window.location = login_path;
		},

		/*
		* TO DO:
		* 	submit request data on server.
		*   
		*/
		submit_request_registration = function() {
			var data       = $('#register-form').serialize();
			var reqdFields = $('.help-block');

			if (reqdFields.length > 0) {
				$(empty[0]).find('input').focus();
        		return false;
			}
			else if ($('#reg-age').val() <= 0) {
				$('#warning-notify').removeClass('hide');
				$('#msg-notify').text('Age must be greater than 0.');
				return false;
			}
			else if ($('#reg-password').val() !== $('#reg-confirm-password').val()) {
				$('#warning-notify').removeClass('hide');
				$('#msg-notify').text('Mismatch password!');
				return false;
			}
			else {
				$.ajax({
			        type : 'POST',
			        url  : login_path + 'index.php/welcome/register',
			        data : { udata : data },
			        dataType : 'json',
			        async: true,
					beforeSend : function() {
			            $('#btn-login').html('Please wait <i class="fa fa-refresh fa-spin"></i>');
			            $('#btn-login').addClass('disabled');
			        },
			        success : function(response) {
			        	if (response.message === "success") {
			        		$('#myModal').modal('show');
			        		$('#msg').text('Successful Registered');
							window.setTimeout(hide_modal, 3400);
			        	}
			        	else {
			        		$('#warning-notify').removeClass('hide');
							$('#msg-notify').text(response.content);
			        	}
				    },
			    });
				return false;
			}
		};

		return {init:init};
	})();
	RegisterModule.init(); 
});
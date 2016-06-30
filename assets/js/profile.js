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
	}
});
require(["jquery", "bootstrap"], function ($) {
	$(function() {
	   $('.toggle').click(function(){
		  $(this).children('i').toggleClass('fa-pencil');
		  $('.form').animate({
		    height: "toggle",
		    'padding-top': 'toggle',
		    'padding-bottom': 'toggle',
		     opacity: "toggle"
		  }, "slow");
		});

	   $('#btn-update').on('click', function(e) {
			console.log('update_triggered');
			var new_password = $('#new_password').val(),
				conf_password = $('#conf_password').val();

				if (new_password !== conf_password) {
					alert('Mismatch Password');
					return false;
				}
				else {
					var id = $('#input-id').val();
					console.log(id);
					update_password(new_password, id);
				}
			e.preventDefault();
		});


	   	function hide_modal() {
			$('#myModal').modal('hide');
			return window.location = login_path + 'index.php/profile/logout';
		}

		function update_password(pass, uid) {
			$.ajax({
		        type : 'POST',
		        url : login_path + 'index.php/profile/update_password',
		        data : { password: pass, id: uid },
		        dataType : 'json',
		        async: true,
		        cache: false,
				beforeSend : function() {
		            $('#btn-update').html('Please wait <i class="fa fa-refresh fa-spin"></i>');
		            $('#btn-update').addClass('disabled');
		        },
		        success : function(response) {
					$('#btn-update').html('login');
		            $('#btn-update').removeClass('disabled');			        	
		        	if (response.success === "success") {
						$('#myModal').modal('show');
						$('#msg').text('Password Successfully Updated');
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
	});
});
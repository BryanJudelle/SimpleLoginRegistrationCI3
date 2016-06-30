<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Simple Registration Form</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
</head>
<body>
<div class = "container">
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<div class="alert alert-danger hide" id="warning-notify">
								  <strong>Danger!</strong> <span id="msg-notify">Indicates a dangerous or potentially negative action.</span>
								</div>

								<form id="login-form" action="#" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button id="btn-login" tabindex="4" class="form-control btn btn-login">Log In</button>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="#" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="reg_username" id="reg-username" tabindex="1" class="form-control required" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="text" name="reg_name" id="reg-name" tabindex="2" class="form-control required" placeholder="name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="reg_age" id="reg-age" tabindex="2" maxlength="3" class="form-control required" placeholder="Age" value="">
									</div>
									<div class="form-group">
										<input type="password" name="reg_password" id="reg-password" tabindex="4" class="form-control required" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="reg_confirm_password" id="reg-confirm-password" tabindex="5" class="form-control required" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<button id="btn-register" tabindex="6" class="form-control btn btn-register">Register Now</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="row">
        <!-- Large modal -->
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<center><h2 id="msg">Logged In Successful</h2></center>
		    	 <center><h4>Redirecting..</h4></center>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/require.js" data-main="<?php echo base_url(); ?>assets/js/main"></script>
<script type="text/javascript"> window.login_path = "<?php echo base_url(); ?>";</script>
</body>
</html>
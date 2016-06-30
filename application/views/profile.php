<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Simple Registration Form</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/profile.css">
</head>
<body>
 <div class="pen-title">
      <h1>Welcome Back! <?php echo $username; ?></h1><span>click the pen tool to update/change password</span>
    </div>
    <div class="module form-module">
      <div class="toggle"><i class="fa fa-times fa-pencil"></i>
      </div>
      <div class="form">
        <h2>Profile Details</h2>
        <div class="form-group">
            <span class=""><label> AGE: </label><?php echo $age; ?></span>
            <input type="hidden" id="input-id" value="<?php echo $id; ?>">
        </div>
        <div class="form-group">
             <span class=""><label> NAME: </label><?php echo isset($name) ? $name : ''; ?></span>
        </div>
        <div class="form-group">
            <span class=""><label> DATE CREATED: </label><?php echo $date_created; ?></span>
        </div>
        <div class="form-group">
            <span class=""><a href="<?php echo site_url('profile/logout'); ?>"> LOG-OUT</a></span>
        </div>
        <span class="error_message1 hidden"><b>Invalid Username or Password</b></span>
        
      </div>
      <div class="form">
        <h2>New Password</h2>
        <form id="update-form">
          <span class="error_message2 hidden"><b>ERROR:</b></span>
          <input type="password" placeholder="password"         id="new_password" name="new_password" class="required" />
          <input type="password" placeholder="Confirm Password" id="conf_password" name="conf_password" class="required"/>
        </form>
          <button id="btn-update">Update Password</button>
      </div>
    </div>
	<!--  -->
	<div class="row">
        <!-- Large modal -->
		<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<center><H2>Logged In Successful..</H2></center>
		    	 <center><h4>Redirecting</h4></center>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/require.js" data-main="<?php echo base_url(); ?>assets/js/profile"></script>
<script type="text/javascript"> window.login_path = "<?php echo base_url(); ?>";</script>
</body>
</html>
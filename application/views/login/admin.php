<?php
$action = 'id="admin_login_form"';
//$action = URL . '/login/checkteacher';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
	<h1>Student Attendance System</h1>
</div>

<form method="POST" <?php echo $action ?>>
<div class="container">
<div class="row">
<div class="col-md-4"></div><!-- / class="col-md-4" -->
<div class="col-md-4" style="margin-top:20px;">
		<div class="card">
		<div class="card-header">Admin Login</div>
		<div class="card-body">
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="admin_user_name" id="admin_user_name" class="form-control" />
				<span id="error_admin_user_name" class="text-danger"></span>
			</div><!-- / class="form-group" -->
            <div class="form-group">
				<label>Password</label>
				<input type="password" name="admin_password" id="admin_password" class="form-control" />
				<span id="error_admin_password" class="text-danger"></span>
			</div><!-- / class="form-group" -->
			<div class="form-group">
				<input type="submit" name="admin_login" id="admin_login" class="btn btn-info" value="Login" />
			</div><!-- / class="form-group" -->
		</div><!-- / class="card-body" -->
		</div><!-- / class="card" -->
</div><!-- / class="col-md-4" -->
<div class="col-md-4"></div><!-- / class="col-md-4" -->
</div><!-- / class="row" -->
</div><!-- / class="container" -->
</form>

<!-- ========================================================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- ========================================================================================== -->
<script>
$(document).ready(function(){
	$('#admin_login_form').on('submit', function(event){
	event.preventDefault();
	$.ajax({
		url:"<?php echo URL ?>/login/checkadmin",
		method:"POST",
		data:$(this).serialize(),
		dataType:"json",
		beforeSend:function(){
			$('#admin_login').val('Validate...');
			$('#admin_login').attr('disabled','disabled');
		},
		success:function(data)
		{
			if(data.success)
			{
				location.href="<?php echo URL ?>/admin/index";
			}
			if(data.error)
			{
				$('#admin_login').val('Login');
				$('#admin_login').attr('disabled', false);
				if(data.error_teacher_emailid != '')
				{
					$('#error_admin_user_name').text(data.error_admin_user_name);
				}
				else
				{
					$('#error_admin_user_name').text('');
				}
				if(data.error_teacher_password != '')
				{
					$('#error_admin_password').text(data.error_admin_password);
				}
				else
				{
					$('#error_admin_password').text('');
				}
			}
/*============================================================================================== */
		}
	})
	});
});
</script>
<!-- ========================================================================================== -->
</body>
</html>
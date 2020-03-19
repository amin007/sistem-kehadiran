<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Attendance System in PHP using Ajax</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
	<h1>Student Attendance System</h1>
</div>

<form method="post" id="teacher_login_form">
<div class="container">
<div class="row">
<div class="col-md-4"></div><!-- / class="col-md-4" -->
<div class="col-md-4" style="margin-top:20px;">
		<div class="card">
		<div class="card-header">Teacher Login</div>
		<div class="card-body">
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="teacher_emailid" id="teacher_emailid" class="form-control" />
				<span id="error_teacher_emailid" class="text-danger"></span>
			</div><!-- / class="form-group" -->
            <div class="form-group">
				<label>Password</label>
				<input type="password" name="teacher_password" id="teacher_password" class="form-control" />
				<span id="error_teacher_password" class="text-danger"></span>
			</div><!-- / class="form-group" -->
			<div class="form-group">
				<input type="submit" name="teacher_login" id="teacher_login" class="btn btn-info" value="Login" />
			</div><!-- / class="form-group" -->
		</div><!-- / class="card-body" -->
		</div><!-- / class="card" -->
</div><!-- / class="col-md-4" -->
<div class="col-md-4"></div><!-- / class="col-md-4" -->
</div><!-- / class="row" -->
</div><!-- / class="container" -->
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>

<script>
$(document).ready(function(){
	$('#teacher_login_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"check_teacher_login.php",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
        $('#teacher_login').val('Validate...');
        $('#teacher_login').attr('disabled','disabled');
      },
      success:function(data)
      {
        if(data.success)
        {
          location.href="index.php";
        }
        if(data.error)
        {
          $('#teacher_login').val('Login');
          $('#teacher_login').attr('disabled', false);
          if(data.error_teacher_emailid != '')
          {
            $('#error_teacher_emailid').text(data.error_teacher_emailid);
          }
          else
          {
            $('#error_teacher_emailid').text('');
          }
          if(data.error_teacher_password != '')
          {
            $('#error_teacher_password').text(data.error_teacher_password);
          }
          else
          {
            $('#error_teacher_password').text('');
          }
        }
      }
    })
  });
});
</script>
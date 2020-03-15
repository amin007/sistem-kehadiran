<?php
#--------------------------------------------------------------------------------------------------
	function diatas($title = 'List Folder')
	{
		print <<<END
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1,, maximum-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>$title</title>
<link href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<style type="text/css">
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:11px;
}
table.excel thead th, table.excel tbody th {
	background:#cccccc;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align: top;
}
table.excel tbody th { text-align:center; vertical-align: top; }
table.excel tbody td { vertical-align:bottom; }
table.excel tbody td
{
	padding: 0 3px; border: 1px solid #aaaaaa;
	background:#ffffff;
}
</style>
</head>
<body>

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function menuAdmin()
	{
		$url = URL;
		print <<<END
<div class="jumbotron-small text-center" style="margin-bottom:0">
	<h1>Student Attendance System</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="$url/admin/index">Home</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	<ul class="navbar-nav">
	<li class="nav-item"><a class="nav-link" href="$url/admin/grade">Grade</a></li>
	<li class="nav-item"><a class="nav-link" href="$url/admin/teacher">Teacher</a></li>
	<li class="nav-item"><a class="nav-link" href="$url/admin/student">Student</a></li>
	<li class="nav-item"><a class="nav-link" href="$url/admin/attendance">Attendance</a></li>
	<li class="nav-item"><a class="nav-link" href="$url/admin/logout">Logout</a></li>
    </ul>
	</div><!-- / class="collapse navbar-collapse" -->
</nav>
END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function menuTeacher()
	{
		$url = URL;
		print <<<END
<div class="jumbotron-small text-center" style="margin-bottom:0">
	<h1>Student Attendance System</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="$url/teacher/index">Home</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	<ul class="navbar-nav">
	<li class="nav-item"><a class="nav-link" href="$url/teacher/profile">Profile</a></li>
	<li class="nav-item"><a class="nav-link" href="$url/teacher/student">Student</a></li>
	<li class="nav-item"><a class="nav-link" href="$url/teacher/attendance">Attendance</a></li>
	<li class="nav-item"><a class="nav-link" href="$url/teacher/logout">Logout</a></li>
	</ul>
	</div><!-- / class="collapse navbar-collapse" -->
</nav>

END;
}
#--------------------------------------------------------------------------------------------------
	function notaKaki()
	{
		print <<<END
<!-- Footer
=============================================================================================== -->
<!-- footer class="footer">
	<div class="container">
		<span class="label label-info">
		&copy; Hak Cipta Terperihara 2016. Theme Asal Bootstrap Twitter
		</span>
	</div>
</footer -->

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function diJquery()
	{
		print <<<END
<!-- khas untuk jquery dan js2 lain
=============================================================================================== -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script -->

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function dibawah()
	{
		print <<<END
</body>
</html>
END;
		#
	}
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
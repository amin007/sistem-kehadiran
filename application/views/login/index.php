<?php
# masukkan fail header dalam view/template/A4.4.1
//atasbawah($type = 'template', $folder = null, $name = '' );
atasbawah('template','A4.4.1','include');
diatas($title);
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
?>

<div id="main">
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Main</span>
</div><br><br>

<div class="container" style="margin-top:20px">
<!-- ========================================================================================== -->
<table class="table">
<tr>
	<td><img src="BANNER.png" width="510"></td>
	<td align=center>
		<br><img src="CoffeeHouse.png" width="250" height="175">
		<br>Masukkan email & kata laluan.
		<br><button type="button" class="btn btn-success" data-toggle="modal"
		data-target=".login-sm">Log Masuk</button>
		<hr>Tidak mempunyai akaun? Sila daftar di sini.
		<br><a class="btn btn-success" href="<?php echo URL ?>/login/daftar">Daftar Akaun</a>
	</td>
</tr></table>
<!-- ========================================================================================== -->
</div><!-- / class="container" -->

<!-- ########################################################################################## -->
<!-- Extra large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-xl" role="document">
<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Tajuk</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body">
		Tengah
	</div><!-- / class="modal-body" -->
	<div class="modal-footer">
		Nota Kaki
	</div><!-- / class="modal-footer" -->
</div><!-- / class="modal-content" -->
</div><!-- / class="modal-dialog" -->
</div><!-- / class="modal fade -->

<!-- ########################################################################################## -->
<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Tajuk</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body">
		Tengah
	</div><!-- / class="modal-body" -->
	<div class="modal-footer">
		Nota Kaki
	</div><!-- / class="modal-footer" -->
</div><!-- / class="modal-content" -->
</div><!-- / class="modal-dialog" -->
</div><!-- / class="modal fade -->
<!-- ########################################################################################## -->
<!-- Small modal -->
<!-- button type="button" class="btn btn-success" data-toggle="modal"
data-target=".login-sm">Log Masuk</button -->

<div class="modal fade login-sm" tabindex="-1" role="dialog"
aria-labelledby="mySmallModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Tajuk</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body">
		Login
	</div><!-- / class="modal-body" -->
	<div class="modal-footer">
		Nota Kaki
	</div><!-- / class="modal-footer" -->
</div><!-- / class="modal-content" -->
</div><!-- / class="modal-dialog" -->
</div><!-- / class="modal fade -->
<!-- ########################################################################################## -->
<?php
diJquery();
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
dibawah();
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
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
		<br><button type="button" class="btn btn-success" data-toggle="modal"
		data-target=".daftarLg">Daftar Akaun</button>
	</td>
</tr></table>
<!-- ========================================================================================== -->
</div><!-- / class="container" -->

<!-- ########################################################################################## -->
<!-- Large modal -->
<!-- button type="button" class="btn btn-success" data-toggle="modal"
data-target=".daftarLg">Daftar Akaun</button -->

<div class="modal fade daftarLg" tabindex="-1" role="dialog"
aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<form>
	<div class="modal-header">
		<h4 class="modal-title">Tajuk</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
	</div>
	<div class="modal-body">
		<?php borangDaftar(); ?>
	</div><!-- / class="modal-body" -->
	<div class="modal-footer">
		Nota Kaki
	</div><!-- / class="modal-footer" -->
</form>
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
###################################################################################################
#--------------------------------------------------------------------------------------------------
	function borangDaftar()
	{
		?>
		<h2><b>Maklumat Peribadi Guru</b></h2><hr>
		<!-- <small>Please fill out your contact information below.</small><br><br>-->

		<label><b>Nama Penuh</b></label>
		<input type="text"  name="teacher_name" required>

		<label><b>Alamat Surat Menyurat</b></label>
		<input type="text" name="teacher_address"  required>

		<lable><b>Email</b></label>
		<input type="text" name="teacher_emailid" id="teacher_emailid" required>

		<label><b>Kata Laluan</b></label>
		<input type="password" name="teacher_password" id="teacher_password"
		class="form-control" required>

		<label><b>Tahap Kelayakan</b></label><br><br>
		<select name="teacher_qualification">
		<option value="0"></option>
		<option value="1">SPM</option>
		<option value="2">Diploma</option>
		<option value="3">Ijazah</option>
		<option value="4">Ijazah Sarjana</option>
		<option value="5">PHD</option>
		<option value="6">Bersara</option>
		</select required><br><br>

		<label><b>Tarikh Mendaftar Sebagai Guru Pusat Tuisyen YNS</b></label><br><br>
		<input type="date" name="teacher_doj" required><br />

		<br/><label><b>Gambar Anda</b></label><br><br>
		<input type="file" name="teacher_image" required /><br>
		<span class="text-muted"><small>Hanya format .jpg & .png</small></span><br><br>

		<label><b>Jenis Pelajar Yang Diajar</b></label><br><br>
		<input type="checkbox" name="teacher_grade_id" value="1">UPSR</input>
		<input type="checkbox" name="teacher_grade_id" value="2">PT3</input>
		<input type="checkbox" name="teacher_grade_id" value="3">SPM</input><br><br>

		<?php
	}
#--------------------------------------------------------------------------------------------------
	function butangBorangDaftar()
	{
		?>
		<button type="submit">Daftar</button>
		<button type="reset">Set Semula</button>
		<input type="checkbox" checked="checked"> Ingat Saya
		<hr>
		<button type="button" onclick="document.getElementById('id01').style.display='none'"
		class="cancelbtn">Batal</button>
		<?php
	}
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
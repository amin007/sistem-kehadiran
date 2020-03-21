<?php
# koleksi fungsi disimpan di sini
#--------------------------------------------------------------------------------------------------
	function debugValue($senarai,$jadual,$p='0')
	{
		//$senarai =  htmlentities();
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre><hr>';
		//echo '<a href="logout.php">Keluar</a><hr>';//*/
		//debugValue($ujian,'ujian',0);
		//$this->debugValue($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#--------------------------------------------------------------------------------------------------
	function showError()
	{
		//$type = $_SESSION['type'];
		//$message = $_SESSION['message'];
		$type = 'Amaran';
		$message = debugValue($_SESSION,'_SESSION');
		print <<<END
<!-- st/.sect-content -->
<section class="content-header">
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Alert!</h4>
		$type<hr>
		$message
	</div>
</section>
<!-- ed/.sect-content -->
END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function diManaJoeJambul($cari)
	{
		$details = new ReflectionFunction($cari);
		echo '<hr>Nama fungsi =' . $cari . '|'
		. 'File location : ' . $details->getFileName()
		. ', Starting line : ' . $details->getStartLine()
		. ', Parametrs passed : ' . $details->getNumberOfParameters()
		. '<hr>';
	}
#--------------------------------------------------------------------------------------------------
	function show_msg()
	{
		if(!empty($_SESSION['type'])) {
		if($_SESSION['type'] == "success") {

			$type = $_SESSION['type'];
			$message = implode('<br>',$_SESSION['message']);

			print <<<END
<!-- st/.sect-content -->
<section class="content-header">
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i> Alert!</h4>
		<p>$message</p>
	</div>
</section>
<!-- ed/.sect-content -->
END;
		#
		} elseif($_SESSION['type'] == "error") {

			$type = $_SESSION['type'];
			$message = implode('<br>',$_SESSION['message']);

			print <<<END
<!-- st/.sect-content -->
<section class="content-header">
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Alert!</h4>
		<p>$message</p>
	</div>
</section>
<!-- ed/.sect-content -->
END;
			#
			}#elseif($_SESSION['type'] == "error")
			}#if(!empty($_SESSION['type']))
			unset($_SESSION['message']);
			unset($_SESSION['type']);
		#
	}
#--------------------------------------------------------------------------------------------------
// Used to render the required views
if (!function_exists('atasbawah'))
{
	function atasbawah($type = 'template', $folder = null, $name = null )
	{
		/*debugValue($type,'type');
		debugValue($folder,'type');
		debugValue($name,'folder');*/
		// You can define render type like json, html, or php to your view
		if ($type == 'template') {
			if ($name != '') require_once (ROOT . '/application/views/'
			. "$type/$folder/$name.php");
		}
		#
	}
}
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
<?php
# masukkan fail header dalam view/template/A4.4.1
//atasbawah($type = 'template', $folder = null, $name = '' );
atasbawah('template','A4.4.1','include');
diatas();
menuAdmin();
#--------------------------------------------------------------------------------------------------
if(!isset($tajukModul)) $tajukModul = 'Ini Deskboard Admin';
if(!isset($action)) $action = '&nbsp;...&nbsp;';
#--------------------------------------------------------------------------------------------------
?>
1grade
<div class="container" style="margin-top:20px">
<div class="card">
	<div class="card-header">
	<!-- ====================================================================================== -->
		<div class="row">
			<div class="col-md-9"><?php echo $tajukModul ?></div>
			<div class="col-md-3" align="right">
			<?php echo $action . "\r" ?>
			<button type="button" class="btn btn-danger btn-sm"
			onclick="confirmdelete(007)">Delete</button>
			</div><!-- / class="col-md-3" -->
		</div><!-- / class="row" -->
	<!-- ====================================================================================== -->
	</div><!-- / class="card-header" -->
	<div class="card-body">
		<?php binaJadual($senarai) ?>
	</div><!-- / class="card-body" -->
</div><!-- / class="card" -->
</div><!-- / class="container" -->

<script type="text/javascript">
function confirmdelete(id)
{
	var messege="Are you sure to DELETE the record(id:"+id+")?";
	var r=confirm(message);
	if(r==true)
	{
		//redirect if user press yes
		window.location.href = "delete.php?x="+id;
	}
}
</script>

<?php
diJquery();
#--------------------------------------------------------------------------------------------------
?>
<script>
$(document).ready(function(){
	/* ***************************************************************************************** */
	/* ***************************************************************************************** */
	/* ***************************************************************************************** */
	/* ***************************************************************************************** */
	/* ***************************************************************************************** */
});
</script>
<?php
#--------------------------------------------------------------------------------------------------
dibawah();
#--------------------------------------------------------------------------------------------------
	function binaJadual($senarai)
	{
		$class = 'table table-striped table-bordered';
		foreach($senarai as $jadual => $row):
			$output = paparJadual2($row,$jadual);
			echo "\r\t" . '<table class="'.$class.'" id="grade_table">'
			. $output . "\r\t" . '</table>';
		endforeach;
		#
	}
#--------------------------------------------------------------------------------------------------
	function paparJadual($row,$jadual)
	{
		$output = null;
		$bil_baris = count($row);
		$printed_headers = false;# mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < $bil_baris; $kira++)
		{	# print the headers once:
			if ( !$printed_headers )
			{##===========================================================
				$output .= "\r\t<thead><tr>";
				foreach ( array_keys($row[$kira]) as $tajuk ) :
				$output .= "\r\t" . '<th>' . $tajuk . '</th>';
				endforeach;
				$output .= "\r\t" . '</tr></thead>';
				$output .= "\r\t" . '<tbody>';
			##============================================================
				$printed_headers = true;
			}
		#-----------------------------------------------------------------
			# print the data row
			$output .= "\r\t<tr>";
			foreach ( $row[$kira] as $key=>$data ) :
			$output .= "\r\t" . '<td>' . $data . '</td>';
			endforeach;
			$output .= "\r\t" . '</tr></tbody>';
		}#----------------------------------------------------------------

		return $output;
	}
#--------------------------------------------------------------------------------------------------
	function paparJadual2($row,$jadual)
	{
		$output = null;
		$bil_baris = count($row);
		$printed_headers = false;# mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < $bil_baris; $kira++)
		{	# print the headers once:
			if ( !$printed_headers )
			{##===========================================================
				$output .= "\r\t<thead><tr>";
				foreach ( array_keys($row[$kira]) as $tajuk ) :
				$output .= "\r\t" . '<th>' . $tajuk . '</th>';
				endforeach;
				$output .= "\r\t" . '</tr></thead>';
				$output .= "\r\t<tbody>\r\t</tbody>";
			##============================================================
				$printed_headers = true;
			}
		}#----------------------------------------------------------------

		return $output;
	}
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
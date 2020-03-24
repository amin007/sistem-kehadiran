<?php
# masukkan fail header dalam view/template/A4.4.1
//atasbawah($type = 'template', $folder = null, $name = '' );
atasbawah('template','A4.4.1','include');
diatas($title);
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
				<button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
				<!-- button type="button" class="btn btn-danger btn-sm"
				onclick="confirmdelete(007)">Delete</button -->
			</div><!-- / class="col-md-3" -->
		</div><!-- / class="row" -->
	<!-- ====================================================================================== -->
	</div><!-- / class="card-header" -->
	<div class="card-body">
		<div class="table-responsive">
		<span id="message_operation"></span>
		<?php binaJadual($senarai) ?>
		</div><!-- / class="table-responsive" -->
	</div><!-- / class="card-body" -->
</div><!-- / class="card" -->
</div><!-- / class="container" -->

<script type="text/javascript">
function confirmdelete(id)
{
	var message="Are you sure to DELETE the record(id:"+id+")?";
	var r=confirm(message);
	if(r==true)
	{
		//redirect if user press yes
		window.location.href = "delete.php?x="+id;
	}
}
</script>

<!-- =========================================================================================== -->
<div class="modal" id="formModal">
<div class="modal-dialog">
<form method="post" id="grade_form">
<div class="modal-content">

	<!-- Modal Header -->
	<div class="modal-header">
		<h4 class="modal-title" id="modal_title"></h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div><!-- /class="modal-header" -->

	<!-- Modal body -->
	<div class="modal-body">
		<div class="form-group row">
			<label class="col-md-4 text-right">Location & Grade Name
			<span class="text-danger">*</span></label>
			<div class="col-md-8">
				<input type="text" name="grade_name" id="grade_name" class="form-control" />
				<span id="error_grade_name" class="text-danger"></span>
			</div><!-- /class="col" -->
		</div><!-- /class="form-group row" -->
	</div><!-- /class="modal-body" -->

	<!-- Modal footer -->
	<div class="modal-footer">
		<input type="hidden" name="grade_id" id="grade_id" />
		<input type="hidden" name="action" id="action" value="Add" />
		<input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Add" />
		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
	</div><!-- /class="modal-footer" -->
</div><!-- /class="modal-content" -->
</form>
</div><!-- /class="modal-dialog" -->
</div><!-- /class="modal" -->
<!-- =========================================================================================== -->
<?php deleteModal(); ?>
<!-- =========================================================================================== -->
<?php
//diJquery();
diJqueryAdmin();
#--------------------------------------------------------------------------------------------------
?>
<script>
$(document).ready(function(){
	/* ***************************************************************************************** */
<?php
	gradeTable001();
	//gradeTable002();
?>
	/* ***************************************************************************************** */
	$('#add_button').click(function(){
		$('#modal_title').text('Add Grade');
		$('#button_action').val('Add');
		$('#action').val('Add');
		$('#formModal').modal('show');
		clear_field();
	});

	function clear_field()
	{
		$('#grade_form')[0].reset();
		$('#error_grade_name').text('');
	}
	/* ***************************************************************************************** */
<?php gradeFormSubmit(); ?>
	/* ***************************************************************************************** */
	var grade_id = '';
<?php EditForm(); ?>
	/* ***************************************************************************************** */
	$(document).on('click', '.delete_grade', function(){
		grade_id = $(this).attr('id');
		$('#deleteModal').modal('show');
	});
	/* ***************************************************************************************** */
	$('#ok_button').click(function(){
		$.ajax({
			url:"<?php echo URL ?>/admin/gradeDelete",
			method:"POST",
			data:{grade_id:grade_id, action:'delete'},
			success:function(data)
			{
				$('#message_operation').html('<div class="alert alert-warning">'+data+'</div>');
				$('#deleteModal').modal('hide');
				dataTable.ajax.reload();
				$('#formModal').modal('hide');
			}
		})
	});
	/* ***************************************************************************************** */
});
</script>
<?php
dibawah();// letak di bawah script
#--------------------------------------------------------------------------------------------------
	function gradeTable001()
	{
		$url = URL;
		print <<<END
	var dataTable = $('#grade_table').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"$url/admin/gradeAction",
			type:"POST",
			data:{action:'fetch'}
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2],
				"orderable":false,
			},
			],
	});

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function gradeTable002()
	{
		$url = URL;
		print <<<END
END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function gradeFormSubmit()
	{
		$url = URL;
		print <<<END
	$('#grade_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"$url/admin/gradeSubmit",
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			beforeSend:function()
			{
				$('#button_action').attr('disabled', 'disabled');
				$('#button_action').val('Validate...');
			},
			success:function(data)
			{
	// -------------------------------------------------------------------------------------------------
				$('#button_action').attr('disabled', false);
				$('#button_action').val($('#action').val());
				if(data.success)
				{
					$('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
					clear_field();
					dataTable.ajax.reload();
					$('#formModal').modal('hide');
				}
				if(data.error)
				{
					if(data.error_grade_name != '')
					{
						$('#error_grade_name').html(data.error_grade_name);
					}
					else
					{
						$('#error_grade_name').text('');
					}
				}
	// -------------------------------------------------------------------------------------------------
			}
		})
	});
END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function EditForm()
	{
		$url = URL;
		print <<<END
	$(document).on('click', '.edit_grade', function(){
		grade_id = $(this).attr('id');
		clear_field();
		$.ajax({
			url:"$url/admin/gradeEdit",
			method:"POST",
			data:{action:'edit_fetch', grade_id:grade_id},
			dataType:"json",
			success:function(data)
			{
				$('#grade_name').val(data.grade_name);
				$('#grade_id').val(data.grade_id);
				$('#modal_title').text('Edit Grade');
				$('#button_action').val('Edit');
				$('#action').val('Edit');
				$('#formModal').modal('show');
			}
		})
	});

END;
		#
	}
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
	function deleteModal()
	{
		print <<<END

<div class="modal" id="deleteModal">
<div class="modal-dialog">
<div class="modal-content">

	<!-- Modal Header -->
	<div class="modal-header">
		<h4 class="modal-title">Delete Confirmation</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div><!-- /class="modal-header" -->

	<!-- Modal body -->
	<div class="modal-body">
		<h3 align="center">Are you sure you want to remove this?</h3>
	</div><!-- /class="modal-body" -->

	<!-- Modal footer -->
	<div class="modal-footer">
		<button type="button" name="ok_button" id="ok_button" class="btn btn-primary btn-sm">OK</button>
		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
	</div><!-- /class="modal-footer" -->

</div><!-- /class="modal-content" -->
</div><!-- /class="modal-dialog" -->
</div><!-- /class="modal" -->

END;
		#
	}
#--------------------------------------------------------------------------------------------------
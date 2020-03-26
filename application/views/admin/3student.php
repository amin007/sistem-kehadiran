<?php
# masukkan fail header dalam view/template/A4.4.1
//atasbawah($type = 'template', $folder = null, $name = '' );
atasbawah('template','A4.4.1','include');
diatas($title);
menuAdmin();
#--------------------------------------------------------------------------------------------------
if(!isset($tajukModul)) $tajukModul = 'Ini Deskboard Admin';
if(!isset($action)) $action = '&nbsp;...&nbsp;';
# untuk form yang kompleks guna ajax, untuk senang debug
//$action = 'id="student_form"';
$action = 'action="' . URL . '/admin/studentFormSubmit"';
#--------------------------------------------------------------------------------------------------
/*
				<!-- button type="button" name="delete_student"
				class="btn btn-danger btn-sm delete_student" id="-100">Delete 100</button -->
				<button type="button" name="view_student"
				class="btn btn-info btn-sm view_student" id="-100">View
				<strong>-100</strong></button>
*/
?>
3student
<div class="container" style="margin-top:20px">
<div class="card">
	<div class="card-header">
	<!-- ====================================================================================== -->
		<div class="row">
			<div class="col-md-9"><?php echo $tajukModul ?></div>
			<div class="col-md-3" align="right">
				<button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
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

<!-- =========================================================================================== -->
<div class="modal" id="formModal">
<div class="modal-dialog">
<form method="post" <?php echo $action ?> enctype="multipart/form-data">
<div class="modal-content">

	<!-- Modal Header -->
	<div class="modal-header">
		<h4 class="modal-title" id="modal_title"></h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div><!-- /class="modal-header" -->

	<!-- Modal body -->
	<div class="modal-body">
<?php formAdd($gradeList); ?>
	</div><!-- /class="modal-body" -->

	<!-- Modal footer -->
	<div class="modal-footer">
		<input type="hidden" name="hidden_student_image" id="hidden_student_image" value="">
		<input type="hidden" name="student_id" id="student_id">
		<input type="hidden" name="action" id="action" value="Add">
		<input type="submit" name="button_action" id="button_action"
		class="btn btn-success btn-sm" value="Add">
		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
	</div><!-- /class="modal-footer" -->
</div><!-- /class="modal-content" -->
</form>
</div><!-- /class="modal-dialog" -->
</div><!-- /class="modal" -->
<!-- =========================================================================================== -->
<div class="modal" id="editModal">
<div class="modal-dialog modal-lg">
<div class="modal-content">

	<!-- Modal Header -->
	<div class="modal-header">
		<h4 class="modal-title">student Edit</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div><!-- /class="modal-header" -->

</div><!-- /class="modal-content" -->
</div><!-- /class="modal-dialog" -->
</div><!-- /class="modal" -->
<!-- =========================================================================================== -->
<div class="modal" id="viewModal">
<div class="modal-dialog modal-lg">
<div class="modal-content">

	<!-- Modal Header -->
	<div class="modal-header">
		<h4 class="modal-title">student Details</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div><!-- /class="modal-header" -->

	<!-- Modal body -->
	<div class="modal-body">
		<div class="row" id="student_details">
		</div><!-- /class="row" -->
	</div><!-- /class="modal-body" -->

	<!-- Modal footer -->
	<div class="modal-footer">
		<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
	</div><!-- /class="modal-footer" -->

</div><!-- /class="modal-content" -->
</div><!-- /class="modal-dialog" -->
</div><!-- /class="modal" -->
<!-- =========================================================================================== -->
<?php deleteModal(); ?>
<!-- =========================================================================================== -->
<?php
//diJquery();
diJqueryAdmin();
$url = URL;
#--------------------------------------------------------------------------------------------------
?>
<script>
<?php
jqueryExtendA();
jqueryExtendB();
jqueryExtendC();
gradeTable002($url);
?>
$(document).ready(function(){
	/* ***************************************************************************************** */
	$('#student_dob').datepicker({
		format:"yyyy-mm-dd",
		autoclose: true,
		container: '#formModal modal-body'
	});
	/* ***************************************************************************************** */
	$('#add_button').click(function(){
		$('#modal_title').text('Add Student');
		$('#button_action').val('Add');
		$('#action').val('Add');
		$('#formModal').modal('show');
		clear_field();
	});
	/* ***************************************************************************************** */
	function clear_field()
	{
		$('#student_form')[0].reset();
		$('#error_student_name').text('');
		$('#error_student_roll_number').text('');
		$('#error_student_dob').text('');
		$('#error_student_grade_id').text('');
	}
	/* ***************************************************************************************** */
<?php formSubmit($url); ?>
	/* ***************************************************************************************** */
	var student_id = '';

	$(document).on('click', '.view_student', function(){
		student_id = $(this).attr('id');
		$.ajax({
			url:"<?php echo URL ?>/admin/studentID",
			method:"POST",
			data:{action:'single_fetch', student_id:student_id},
			success:function(data)
			{
				$('#viewModal').modal('show');
				$('#student_details').html(data);
			}
		});
	});
	/* ***************************************************************************************** */
<?php editForm($url); ?>
	/* ***************************************************************************************** */
	$(document).on('click', '.delete_student', function(){
		student_id = $(this).attr('id');
		$('#deleteModal').modal('show');
	});
	/* ***************************************************************************************** */
	$('#ok_button').click(function(){
		$.ajax({
			url:"<?php echo URL ?>/admin/studentDelete",
			method:"POST",
			data:{student_id:student_id, action:'delete'},
			success:function(data)
			{
				$('#message_operation').html('<div class="alert alert-warning">'+data+'</div>');
				$('#deleteModal').modal('hide');
				$('#allTable').DataTable().ajax.reload();
			}
		})
	});
	/* ***************************************************************************************** */
});
</script>
<?php
dibawah();// letak di bawah script
#--------------------------------------------------------------------------------------------------
	function gradeTable001($url)
	{
		print <<<END
	var dataTable = $('#allTable').DataTable({
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
	/* ***************************************************************************************** */

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function gradeTable002($url)
	{
		print <<<END
	var t = $('#allTable').DataTable({
	"ajax": "$url/admin/studentData",
	searchHighlight: true,
	"columnDefs": [{
		"searchable": false,
		"orderable": false,
		"targets": 0
	}],
	"order": []
    });

	t.on( 'order.dt search.dt', function (){
		t.column(0, {search:'applied', order:'applied'}).nodes().
		each( function (cell, i) {cell.innerHTML = i+1;});
    }).draw();
	/* ***************************************************************************************** */

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function jqueryExtendA()
	{
		print <<<END
jQuery.extend({
	highlight: function (node, re, nodeName, className)
	{
		if (node.nodeType === 3)
		{
			var match = node.data.match(re);
			if (match)
			{
				var highlight = document.createElement(nodeName || 'span');
				highlight.className = className || 'highlight';
				var wordNode = node.splitText(match.index);
				wordNode.splitText(match[0].length);
				var wordClone = wordNode.cloneNode(true);
				highlight.appendChild(wordClone);
				wordNode.parentNode.replaceChild(highlight, wordNode);
				return 1; //skip added node in parent
			}
		}
		else if ((node.nodeType === 1 && node.childNodes) && //only element nodes that have children
			!/(script|style)/i.test(node.tagName) && //ignore script and style nodes
			!(node.tagName === nodeName.toUpperCase() && node.className === className))
		{//skip if already highlighted
			for (var i = 0; i < node.childNodes.length; i++)
			{
				i += jQuery.highlight(node.childNodes[i], re, nodeName, className);
			}
		}
		return 0;
	}
});
	/* ***************************************************************************************** */

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function jqueryExtendB()
	{
		print <<<END
jQuery.fn.unhighlight = function (options)
{
	var settings = { className: 'highlight', element: 'span' };
	jQuery.extend(settings, options);

	return this.find(settings.element + "." + settings.className).each(function ()
	{
		var parent = this.parentNode;
		parent.replaceChild(this.firstChild, this);
		parent.normalize();
	}).end();
};
	/* ***************************************************************************************** */

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function jqueryExtendC()
	{
		print <<<END
jQuery.fn.highlight = function (words, options)
{
	var settings = { className: 'highlight', element: 'span', caseSensitive: false, wordsOnly: false };
	jQuery.extend(settings, options);

	if (words.constructor === String){words = [words];}
	words = jQuery.grep(words, function(word, i){return word != '';});
	words = jQuery.map(words, function(word, i)
	{
		return word.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
	});
	if (words.length == 0) { return this; };

	var flag = settings.caseSensitive ? "" : "i";
	var pattern = "(" + words.join("|") + ")";
	if (settings.wordsOnly){pattern = "\\b" + pattern + "\\b";}
	var re = new RegExp(pattern, flag);

	return this.each(function ()
	{
		jQuery.highlight(this, re, settings.element, settings.className);
    });
};
	/* ***************************************************************************************** */

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function formSubmit($url)
	{
		//$('#example').DataTable().ajax.reload();
		//$('#allTable').DataTable().ajax.reload();
		print <<<END
	$('#student_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"$url/admin/studentFormSubmit",
			method:"POST",
			data:new FormData(this),
			dataType:"json",
			contentType:false, processData:false,
			beforeSend:function()
			{
				$('#button_action').val('Validate...');
				$('#button_action').attr('disabled', 'disabled');
			},
			success:function(data)
			{
			// ------------------------------------------------------------------------------------
				$('#button_action').attr('disabled', false);
				$('#button_action').val($('#action').val());
				if(data.success)
				{
					$('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
					clear_field();
					$('#formModal').modal('hide');
					$('#allTable').DataTable().ajax.reload();
				}
				if(data.error)
				{// ============================================================================
					if(data.error_student_name != '')
					{
						$('#error_student_name').text(data.error_student_name);
					}
					else { $('#error_student_name').text(''); }
					if(data.error_student_address != '')
					{
						$('#error_student_address').text(data.error_student_address);
					}
					else { $('#error_student_address').text(''); }
					if(data.error_student_emailid != '')
					{
						$('#error_student_emailid').text(data.error_student_emailid);
					}
					else { $('#error_student_emailid').text(''); }
					if(data.error_student_password != '')
					{
						$('#error_student_password').text(data.error_student_password);
					}
					else { $('#error_student_password').text(''); }
					if(data.error_student_grade_id != '')
					{
						$('#error_student_grade_id').text(data.error_student_grade_id);
					}
					else { $('#error_student_grade_id').text(''); }
					if(data.error_student_qualification != '')
					{
						$('#error_student_qualification').text(data.error_student_qualification);
					}
					else { $('#error_student_qualification').text(''); }
					if(data.error_student_doj != '')
					{
						$('#error_student_doj').text(data.error_student_doj);
					}
					else { $('#error_student_doj').text(''); }
					if(data.error_student_ic != '')
					{
						$('#error_student_ic').text(data.error_student_ic);
					}
					else { $('#error_student_ic').text(''); }
					if(data.error_student_phone != '')
					{
						$('#error_student_phone').text(data.error_student_phone);
					}
					else { $('#error_student_phone').text(''); }
					if(data.error_student_acc != '')
					{
						$('#error_student_acc').text(data.error_student_acc);
					}
					else { $('#error_student_acc').text(''); }
					if(data.error_student_image != '')
					{
						$('#error_student_image').text(data.error_student_image);
					}
					else { $('#error_student_image').text(''); }
				}//if(data.error)
			// ------------------------------------------------------------------------------------
			}//success:function(data)
		});
	});

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function editForm($url)
	{
		//dataType:"json",
		print <<<END
	$(document).on('click', '.edit_student', function(){
		student_id = $(this).attr('id');
		//clear_field(); ada masalah teknikal, terpaksa komen dulu
		$.ajax({
			url:"$url/admin/studentIDForm",
			method:"POST",
			data:{action:'edit_fetch', student_id:student_id},
			dataType:"json",
			success:function(data)
			{
				// untuk debug data wujud atau tidak ----------------------------------------------
				alert(data.student_name);
				alert(data.student_roll_number);
				alert(data.student_dob);
				alert(data.student_grade_id);
				alert(data.student_id);
				// masukkan dalam value -----------------------------------------------------------
				$('#student_name').val(data.student_name);
				$('#student_roll_number').val(data.student_roll_number);
				$('#student_dob').val(data.student_dob);
				$('#student_grade_id').val(data.student_grade_id);
				$('#student_id').val(data.student_id);
				// --------------------------------------------------------------------------------
				$('#modal_title').text('Edit student');
				$('#button_action').val('Edit');
				$('#action').val('Edit');
				$('#formModal').modal('show');
			}
		});
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
			echo "\r\t" . '<table class="'.$class.'" id="allTable">'
			. $output . "\r\t" . '</table>' . "\r\r";
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
	function formAdd($loadGradeList = null)
	{
		print <<<END
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Student Name
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="student_name" id="student_name">
					<span id="error_student_name" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Roll No.
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="student_roll_number" id="student_roll_number" />
					<span id="error_student_roll_number" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Date of Birth
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="student_dob" id="student_dob">
					<span id="error_student_dob" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Grade
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<select class="form-control" name="student_grade_id" id="student_grade_id">
					<option value="">Select Location & Grade</option>$loadGradeList
					</select>
					<span id="error_student_grade_id" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->

END;
		#
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
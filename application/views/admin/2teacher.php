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
/*
				<!-- button type="button" name="delete_teacher"
				class="btn btn-danger btn-sm delete_teacher" id="-100">Delete 100</button -->
				<button type="button" name="view_teacher"
				class="btn btn-info btn-sm view_teacher" id="-100">View
				<strong>-100</strong></button>
*/
?>
2teacher
<div class="container" style="margin-top:20px">
<div class="card">
	<div class="card-header">
	<!-- ====================================================================================== -->
		<div class="row">
			<div class="col-md-9"><?php echo $tajukModul ?></div>
			<div class="col-md-3" align="right">
				<button type="button" id="add_button" class="btn btn-info btn-sm">Add</button>
				<button type="button" name="view_teacher"
				class="btn btn-info btn-sm view_teacher" id="-100">View
				<strong>-100</strong></button>
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
<form method="post" id="teacher_form" enctype="multipart/form-data">
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
		<input type="hidden" name="hidden_teacher_image" id="hidden_teacher_image" value="">
		<input type="hidden" name="teacher_id" id="teacher_id">
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
<div class="modal" id="viewModal">
<div class="modal-dialog modal-lg">
<div class="modal-content">

	<!-- Modal Header -->
	<div class="modal-header">
		<h4 class="modal-title">Teacher Details</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
	</div><!-- /class="modal-header" -->

	<!-- Modal body -->
	<div class="modal-body">
		<div class="row" id="teacher_details">
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
	$('#teacher_grade_id').change(function(){
		var city = $(this).val();
		// AJAX request
		$.ajax({
			url:'<?php echo URL ?>/admin/gradeList',
			method: 'post',
			data: {city: city},
			dataType: 'json',
			success: function(response)
			{
				// Add options
				$.each(response,function(index,data){
				$('#teacher_grade_id').append('<option value="'+data['id']
				+'">'+data['name']+'</option>');
				});
		  }
		});
	});
	/* ***************************************************************************************** */
	$('#add_button').click(function(){
		$('#modal_title').text('Add Teacher');
		$('#button_action').val('Add');
		$('#action').val('Add');
		$('#formModal').modal('show');
		clear_field();
	});
	/* ***************************************************************************************** */
	function clear_field()
	{
		$('#teacher_form')[0].reset();
		$('#error_teacher_name').text('');
		$('#error_teacher_address').text('');
		$('#error_teacher_emailid').text('');
		$('#error_teacher_password').text('');
		$('#error_teacher_qualification').text('');
		$('#error_teacher_doj').text('');
		$('#error_teacher_ic').text('');
		$('#error_teacher_phone').text('');
		$('#error_teacher_acc').text('');
		$('#error_teacher_image').text('');
		$('#error_teacher_grade_id').text('');
	}
	/* ***************************************************************************************** */
	var teacher_id = '';

	$(document).on('click', '.view_teacher', function(){
		teacher_id = $(this).attr('id');
		$.ajax({
			url:"<?php echo URL ?>/admin/teacherID",
			method:"POST",
			data:{action:'single_fetch', teacher_id:teacher_id},
			success:function(data)
			{
				$('#viewModal').modal('show');
				$('#teacher_details').html(data);
			}
		});
	});
	/* ***************************************************************************************** */
<?php gradeFormSubmit($url); ?>
	/* ***************************************************************************************** */
	var grade_id = '';
<?php editForm($url); ?>
	/* ***************************************************************************************** */
	$(document).on('click', '.delete_teacher', function(){
		grade_id = $(this).attr('id');
		$('#deleteModal').modal('show');
	});
	/* ***************************************************************************************** */
	$('#ok_button').click(function(){
		$.ajax({
			url:"<?php echo URL ?>/admin/teacherDelete",
			method:"POST",
			data:{grade_id:grade_id, action:'delete'},
			success:function(data)
			{
				$('#message_operation').html('<div class="alert alert-warning">'+data+'</div>');
				$('#deleteModal').modal('hide');
				$('#grade_table').DataTable().ajax.reload();
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
	/* ***************************************************************************************** */

END;
		#
	}
#--------------------------------------------------------------------------------------------------
	function gradeTable002($url)
	{
		print <<<END
	var t = $('#grade_table').DataTable({
	"ajax": "$url/admin/teacherData",
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
	function gradeFormSubmit($url)
	{
		//$('#example').DataTable().ajax.reload();
		//$('#grade_table').DataTable().ajax.reload();
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
					$('#formModal').modal('hide');
					$('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
					clear_field();
					$('#grade_table').DataTable().ajax.reload();
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
	function editForm($url)
	{
		print <<<END
	$(document).on('click', '.edit_grade', function(){
		grade_id = $(this).attr('id');
		clear_field();
		$.ajax({
			url:"$url/admin/gradeEditForm",
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
			<div class="form-group row">
				<label class="col-md-4 text-right">Teacher Name
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="teacher_name" id="teacher_name">
					<span id="error_teacher_name" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Address
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<textarea class="form-control" name="teacher_address" id="teacher_address"></textarea>
					<span id="error_teacher_address" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Email Address 
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="teacher_emailid" id="teacher_emailid">
					<span id="error_teacher_emailid" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Password
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="password" class="form-control"
					name="teacher_password" id="teacher_password">
					<span id="error_teacher_password" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Qualification
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="teacher_qualification" id="teacher_qualification">
					<span id="error_teacher_qualification" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Grade
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<select class="form-control" name="teacher_grade_id" id="teacher_grade_id">
					<option value="">Select Grade</option>$loadGradeList
					</select>
					<span id="error_teacher_grade_id" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Date of Joining
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="teacher_doj" id="teacher_doj">
					<span id="error_teacher_doj" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">IC No
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="teacher_ic" id="teacher_ic">
					<span id="error_teacher_ic" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Phone No<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="teacher_phone" id="teacher_phone">
					<span id="error_teacher_phone" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Account No (BIMB)<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="text" class="form-control"
					name="teacher_acc" id="teacher_acc">
					<span id="error_teacher_acc" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->
			<div class="form-group row">
				<label class="col-md-4 text-right">Image
				<span class="text-danger">*</span></label>
				<div class="col-md-8">
					<input type="file" name="teacher_image" id="teacher_image" />
					<span class="text-muted">Only .jpg and .png allowed</span><br />
					<span id="error_teacher_image" class="text-danger"></span>
				</div><!-- / class="col" -->
			</div><!-- / class="form-group row" -->
			<!-- =============================================================================== -->

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
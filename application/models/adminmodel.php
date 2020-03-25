<?php

class AdminModel extends Model
{
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	function bentukSqlGrade()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = " SELECT \"\" as Bil, grade_name '&nbsp;Location & Grade Name',"
		. "grade_id '&nbsp;Edit', grade_id '&nbsp;Delete' "
		. " FROM tbl_grade "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataSqlGrade()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->bentukSqlGrade();
		$this->_setSql($sql);
		$data = $this->getAll();

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	function bentukSql2Grade()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = " SELECT grade_name, grade_id "
		. " FROM tbl_grade ";
		/*if(isset($_POST["search"]["value"]))
			$sql .= 'WHERE grade_name LIKE "%'.$_POST["search"]["value"].'%" ';
		if(isset($_POST["order"]))
			$sql .= (isset($_POST["order"])) ?
				'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' '
				: 'ORDER BY grade_id DESC ';
		if($_POST["length"] != -1)
			$sql .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];//*/

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function data2SqlGrade()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->bentukSql2Grade();
		$this->_setSql($sql);
		$data = $this->getAll();

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	function bentukDataGrade()
	{
		$result = $this->data2SqlGrade();
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		$data = array();
		#------------------------------------------------------------------------------------------
		foreach($result as $row)
		{
			$sub_array = array();
			$sub_array[] = null;
			$sub_array[] = $row['grade_name'];
			$sub_array[] = '<button type="button" name="edit_grade"'
			. ' class="btn btn-primary btn-sm edit_grade" id="' . $row['grade_id']
			. '">Edit</button>';
			$sub_array[] = '<button type="button" name="delete_grade"'
			. ' class="btn btn-danger btn-sm delete_grade" id="' . $row['grade_id']
			. '">Delete <strong>' . $row['grade_id'] . '</strong></button>';
			$data[] = $sub_array;
		}
		#------------------------------------------------------------------------------------------
		return array($totalRow,$data);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	function sqlCariGrade($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = " SELECT * FROM tbl_grade "
		. " WHERE grade_id = '$id' "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataCariGrade($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->sqlCariGrade($id);
		$this->_setSql($sql);
		$data = $this->getAll();

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function cariGradeById($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$result = $this->dataCariGrade($id);
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		$output = array();
		#------------------------------------------------------------------------------------------
		foreach($result as $row):
			$output["grade_name"] = $row["grade_name"];
			$output["grade_id"] = $row["grade_id"];
		endforeach;
		#------------------------------------------------------------------------------------------
		return array($output);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# untuk grade - insert
#--------------------------------------------------------------------------------------------------
	function sqlInsertGrade($gradeName)
	{
		$sql = "
		INSERT INTO tbl_grade(grade_name)
		SELECT * FROM (SELECT :grade_name) as temp
		WHERE NOT EXISTS (
			SELECT grade_name FROM tbl_grade
			WHERE grade_name = :grade_name
		) LIMIT 1 ";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataInsertGrade($gradeName)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$dataAll = array(
			':grade_name' => $gradeName,
		);
		$sql = $this->sqlInsertGrade($gradeName);
		$this->_setSql($sql);
		//$data = $this->getAll($dataAll);
		$data = $this->getInUpDel($dataAll);

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function insertGrade($gradeName)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$totalRow = $this->dataInsertGrade($gradeName);
		//debugValue($totalRow,'totalRow');
		$output = array(); $dataDaa = '<strong>' . $gradeName . '</strong>';
		#------------------------------------------------------------------------------------------
		if($totalRow > 0)
			$output = array('success' => 'Data ' . $dataDaa . ' Added Successfully');
		else
		{
			$output = array(
				'error'	=> true,
				'error_grade_name' => 'Data ' . $dataDaa . ' Error Insert. '
				. 'Grade Name Already Exists'
			);
		}
		#------------------------------------------------------------------------------------------
		return $output;//*/
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# untuk grade - update
#--------------------------------------------------------------------------------------------------
	function sqlUpdateGrade($gradeName)
	{
		$sql = "
		UPDATE tbl_grade
		SET grade_name = :grade_name
		WHERE grade_id = :grade_id
		";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataUpdateGrade($id,$gradeName)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$dataAll = array(
			':grade_name' => $gradeName,
			':grade_id' => $id
		);
		$sql = $this->sqlUpdateGrade($gradeName);
		$this->_setSql($sql);
		//$data = $this->getAll($dataAll);
		$data = $this->getInUpDel($dataAll);

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function updateGrade($id,$gradeName)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$totalRow = $this->dataUpdateGrade($id,$gradeName);
		//debugValue($totalRow,'totalRow');
		$output = array(); $dataDaa = '<strong>' . $gradeName . '</strong>';
		#------------------------------------------------------------------------------------------
		if($totalRow > 0)
			$output = array('success' => 'Data ' . $dataDaa . ' Updated Successfully');
		else
		{
			$output = array(
				'error'	=> true,
				'error_grade_name' => 'Data ' . $dataDaa . ' Error Update'
			);
		}
		#------------------------------------------------------------------------------------------
		return $output;//*/
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# untuk grade - delete
#--------------------------------------------------------------------------------------------------
	function sqlDeleteGrade()
	{
		$sql = "
		DELETE FROM tbl_grade
		WHERE grade_id = :grade_id
		";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataDeleteGrade($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$dataAll = array(
			':grade_id' => $id
		);
		$sql = $this->sqlDeleteGrade();
		$this->_setSql($sql);
		//$data = $this->getAll($dataAll);
		$data = $this->getInUpDel($dataAll);

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function deleteGrade($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$totalRow = $this->dataDeleteGrade($id);
		//debugValue($totalRow,'totalRow');
		$output = array(); $dataDaa = '<strong>' . $id . '</strong>';
		#------------------------------------------------------------------------------------------
		if($totalRow > 0)
			$output = 'Id ' . $dataDaa . ' Deleted Successfully.';
		else
			$output = 'Id ' . $dataDaa . ' Does Not Exist.';
		#------------------------------------------------------------------------------------------
		return $output;//*/
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# untuk dapatkan list grade
#--------------------------------------------------------------------------------------------------
	function sqlGradeList()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = " SELECT * FROM tbl_grade "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataGradeList()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->sqlGradeList();
		$this->_setSql($sql);
		$data = $this->getAll();

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function getGradeList()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$result = $this->dataGradeList();//debugValue($result,'result');
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		$data = '';
		#------------------------------------------------------------------------------------------
		if($totalRow > 0):foreach($result as $key => $row):
			$data .= "\n\t\t\t\t\t" . '<option value="' . $row['grade_id'] . '">'
			. $row['grade_name'] . '</option>';
			//$data[$key]['id'] = $row['grade_id'];
			//$data[$key]['name'] = $row['grade_name'];
		endforeach;
		else: $data = '';
		endif;
		#------------------------------------------------------------------------------------------
		return $data;
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# data tentang teacher
#--------------------------------------------------------------------------------------------------
	function sqlTeacherTajuk()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql0 = 'SELECT * FROM tbl_teacher 
		INNER JOIN tbl_grade 
		ON tbl_grade.grade_id = tbl_teacher.teacher_grade_id 
		';
		$sql = " SELECT \"\" as Bil,teacher_image '&nbsp;Image',"
		. " teacher_name '&nbsp;Teacher Name',"
		. " teacher_emailid '&nbsp;Email Address',grade_name '&nbsp;Location & Grade',"
		. " teacher_acc '&nbsp;Account',"
		. " teacher_id '&nbsp;View', teacher_id '&nbsp;Edit', teacher_id '&nbsp;Delete' "
		. " FROM tbl_teacher INNER JOIN tbl_grade "
		. "	ON tbl_grade.grade_id = tbl_teacher.teacher_grade_id  "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataSqlTeacherTajuk()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->sqlTeacherTajuk();
		$this->_setSql($sql);
		$data = $this->getAll();

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	function dataTeacherTajuk()
	{
		$result = $this->dataSqlTeacherTajuk();
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		#------------------------------------------------------------------------------------------
		#------------------------------------------------------------------------------------------
		return array($totalRow,$result);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# untuk teacher - data bawah
#--------------------------------------------------------------------------------------------------
	function sqlTeacherAll()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = "SELECT teacher_image,teacher_name,teacher_emailid,"
		. " grade_name,teacher_acc,teacher_id"
		. " FROM tbl_teacher INNER JOIN tbl_grade "
		. "	ON tbl_grade.grade_id = tbl_teacher.teacher_grade_id "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataTeacherAll()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->sqlTeacherAll();
		$this->_setSql($sql);
		$data = $this->getAll();

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function bentukDataTeacher()
	{
		$result = $this->dataTeacherAll();//debugValue($result,'result');
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		#------------------------------------------------------------------------------------------
		if($totalRow > 0):foreach($result as $row):
			$sub_array = array();
			$sub_array[] = null;
			$sub_array[] = '<img src="' . URL . '/sumber/teacher_image/' . $row["teacher_image"]
			. '" class="img-thumbnail" width="75" />';
			$sub_array[] = $row["teacher_name"];
			$sub_array[] = $row["teacher_emailid"];
			$sub_array[] = $row["grade_name"];
			$sub_array[] = $row["teacher_acc"];
			$sub_array[] = '<button type="button" name="view_teacher" '
			. ' class="btn btn-info btn-sm view_teacher" id="' . $row["teacher_id"]
			. '">View <strong>' . $row["teacher_id"] . '</strong></button>';
			$sub_array[] = '<button type="button" name="edit_teacher"'
			. ' class="btn btn-primary btn-sm edit_teacher" id="' . $row["teacher_id"]
			. '">Edit</button>';
			$sub_array[] = '<button type="button" name="delete_teacher"'
			. ' class="btn btn-danger btn-sm delete_teacher" id="' . $row["teacher_id"]
			. '">Delete</button>';
			$data[] = $sub_array;
		endforeach;
		else: $data[] = '<div class="col-md"> Data Tidak Wujud</div>';
		endif;
		#------------------------------------------------------------------------------------------
		return array($totalRow,$data);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# cari seorang teacher sahaja untuk view
#--------------------------------------------------------------------------------------------------
	function sqlTeacherID()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = "SELECT teacher_image Image, teacher_name 'Name', teacher_address 'Address',"
		. "teacher_emailid 'Email Address',teacher_qualification 'Qualification',"
		. "teacher_doj 'Date of Joining',grade_name 'Location & Grade',teacher_ic 'IC No',"
		. "teacher_phone 'Phone No',teacher_acc 'Acconut No' "
		. " FROM tbl_teacher INNER JOIN tbl_grade "
		. "	ON tbl_grade.grade_id = tbl_teacher.teacher_grade_id "
		. " WHERE tbl_teacher.teacher_id = :id "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataTeacherID($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$dataAll = array(':id' => $id);
		$sql = $this->sqlTeacherID();
		$this->_setSql($sql);
		//$data = $this->getAll($dataAll);// dapatkan semua data
		$data = $this->getRow($dataAll);// dapatkan satu data sahaja

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function bentukTeacherID($id)
	{
		$result = $this->dataTeacherID($id);//debugValue($result,'result');
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		$dataAtas = $dataAll = null;
		#------------------------------------------------------------------------------------------
		if($totalRow > 0):foreach($result as $key => $val):
			$dataAtas = '<img src="' . URL . '/sumber/teacher_image/'
			. $result['Image'] . '" class="img-thumbnail" />';
			#--------------------------------------------------------------------------------------
			if(!in_array($key,array('Image')))
			$dataAll .= "\n\t\t\t" . '<tr><th>' . ucfirst($key) . '</th><td>'
			. $val . '</td></tr>';
		endforeach;
		else: $dataAll = '<div class="col-md"> Data Tidak Wujud</div>';
		endif;
		#------------------------------------------------------------------------------------------
		return array($totalRow,$dataAtas,$dataAll);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# untuk paparkan dalam bentuk form teacherID
#--------------------------------------------------------------------------------------------------
	function sqlTeacherIDForm()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = "SELECT * "
		. " FROM tbl_teacher "
		. " WHERE teacher_id = :id "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataTeacherIDForm($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$dataAll = array(':id' => $id);
		$sql = $this->sqlTeacherIDForm();
		$this->_setSql($sql);
		//$data = $this->getAll($dataAll);// dapatkan semua data
		$data = $this->getRow($dataAll);// dapatkan satu data sahaja

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function bentukTeacherIDForm($id)
	{
		$result = $this->dataTeacherIDForm($id);//debugValue($result,'result');
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		$data = null;
		#------------------------------------------------------------------------------------------
		if($totalRow > 0):foreach($result as $key => $val):
			$data[$key] = $val;
		endforeach;
		//else: $data = '<div class="col-md"> Data Tidak Wujud</div>';
		endif;
		#------------------------------------------------------------------------------------------
		return array($totalRow,$data);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# semak post
#--------------------------------------------------------------------------------------------------
	function pilihGambar($errorKira = 0)
	{
		$teacher_image = $_POST["hidden_teacher_image"];
		if($_FILES["teacher_image"]["name"] != '')
		{
			$file_name = $_FILES["teacher_image"]["name"];
			$tmp_name = $_FILES["teacher_image"]["tmp_name"];
			$extension_array = explode(".", $file_name);
			$extension = strtolower($extension_array[1]);
			$allowed_extension = array('jpg','png');
			if(!in_array($extension, $allowed_extension))
			{
				$error['teacher_image'] = 'Invalid Image Format';
				$error['kira'] = $errorKira++;
			}
			else
			{
				$data = uniqid() . '.' . $extension;
				$upload_path = ROOT . DS . 'public' . DS . 'sumber' . DS
				. 'teacher_image/' . $data;
				move_uploaded_file($tmp_name, $upload_path);
			}
		}
		else
		{
			if($data == '')
			{
				$error['teacher_image'] = 'Image is required';
				$error['kira'] = $errorKira++;
			}
		}
		#------------------------------------------------------------------------------------------
		return array($error,$data);
		#------------------------------------------------------------------------------------------
	}
#--------------------------------------------------------------------------------------------------
	public function cincang($data)
	{
		#https://www.php.net/manual/en/function.password-hash.php
		if (function_exists('password_hash'))
		{# php >= 5.5
			//$numAlgo = PASSWORD_DEFAULT;
			//$numAlgo = PASSWORD_ARGON2I; php7.2.0
			//$numAlgo = PASSWORD_ARGON2ID; php7.3.0
			$numAlgo = PASSWORD_BCRYPT;
			$options = array('cost' => 12);
			$cincang = password_hash($data, $numAlgo, $options);
		}
		else
		{
			$garam = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
			$garam = base64_encode($garam);
			$garam = str_replace('+', '.', $garam);
			$cincang = crypt($data, '$2y$18$' . $garam . '$');
		}

		return $cincang;
	}
#--------------------------------------------------------------------------------------------------
	public function semakPOST()
	{
		# untuk image sahaja
		list($error,$teacher_image) = $this->pilihGambar();
		$data[':teacher_image'] = $teacher_image;
		# proses data lain
		$abaikan = array('hidden_teacher_image','teacher_id','button_action','action');
		foreach($_POST as $key => $val):
			if(!in_array($key,$abaikan)):
				if($key == 'teacher_password')
					$data[":$key"] = $this->cincang(trim($val));
				else
					$data[":$key"] = trim($val);
			endif;
		endforeach;

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	function sqlInsertTeacher($posmen)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = "
		INSERT INTO tbl_teacher
		(teacher_name, teacher_address, teacher_emailid, teacher_password, teacher_qualification,
		teacher_grade_id, teacher_doj, teacher_ic, teacher_phone, teacher_acc, teacher_image)
		SELECT * FROM (SELECT :teacher_name, :teacher_address, :teacher_emailid, :teacher_password,
		:teacher_qualification, :teacher_grade_id, :teacher_doj, :teacher_ic, :teacher_phone,
		:teacher_acc, :teacher_image) as temp
		WHERE NOT EXISTS (
			SELECT teacher_emailid FROM tbl_teacher
			WHERE teacher_emailid = :teacher_emailid
		) LIMIT 1";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataInsertTeacher($posmen)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//debugValue($posmen,'posmen');

		$sql = $this->sqlInsertTeacher($posmen);
		$this->_setSql($sql);
		//$data = $this->getAll($posmen);
		$data = $this->getInUpDel($posmen);

		return $data;
	}
#--------------------------------------------------------------------------------------------------
	public function bentukInsertTeacher($posmen)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$totalRow = $this->dataInsertTeacher($posmen);
		//debugValue($totalRow,'totalRow');
		$output = array();
		#------------------------------------------------------------------------------------------
		if($totalRow > 0)
			$output = 'Data Added Successfully';
		else
		{
			$output = 'Data Error Insert. ';
		}
		#------------------------------------------------------------------------------------------
		return $output;//*/
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	public function getNews()
	{
		$this->_setSql($sql);
		$articles = $this->getAll();

		if (empty($articles)){ return false; }

		return $articles;
	}
#--------------------------------------------------------------------------------------------------
	public function getArticleById($id)
	{
		$this->_setSql($sql);
		$articleDetails = $this->getRow(array($id));

		if (empty($articleDetails)) { return false; }

		return $articleDetails;
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}
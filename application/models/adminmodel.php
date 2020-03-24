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
# untuk insert
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
# untuk update
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
# untuk delete
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
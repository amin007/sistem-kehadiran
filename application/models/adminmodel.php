<?php

class AdminModel extends Model
{
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	function bentukSqlGrade()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = " SELECT grade_name '&nbsp;Location & Grade Name',"
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
		. " FROM tbl_grade "
		. "";

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
			$sub_array[] = $row['grade_name'];
			$sub_array[] = '<button type="button" name="edit_grade"'
			. ' class="btn btn-primary btn-sm edit_grade" id="' . $row['grade_id']
			. '">Edit</button>';
			$sub_array[] = '<button type="button" name="delete_grade"'
			. ' class="btn btn-danger btn-sm delete_grade" id="' . $row['grade_id']
			. '">Delete</button>';
			$data[] = $sub_array;
		}
		#------------------------------------------------------------------------------------------
		return array($totalRow,$data);
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
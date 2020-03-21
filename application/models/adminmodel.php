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
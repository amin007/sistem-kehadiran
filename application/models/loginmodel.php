<?php

class LoginModel extends Model
{
#--------------------------------------------------------------------------------------------------
	public function semakDatabase($userEmailid,$userPassword)
	{
		$sql = $this->bentukSqlTeacher();
		$userPassword = $this->dataSqlTeacher($sql);
	}
#--------------------------------------------------------------------------------------------------
	function bentukSqlTeacher()
	{
		$sql = "SELECT * FROM tbl_teacher "
		. "\r WHERE teacher_emailid = '" . $teacher_emailid . "' "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataSqlTeacher($sql)
	{
		$this->_setSql($sql);
		$userPassword = $this->getAll();

		if (empty($userPassword)){ return false; }

		return $userPassword;		
	}
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
}
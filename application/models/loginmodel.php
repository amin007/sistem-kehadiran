<?php

class LoginModel extends Model
{
#--------------------------------------------------------------------------------------------------
	public function semakDatabase($userEmailid,$userPassword)
	{
		$sql = $this->bentukSqlTeacher($userEmailid);
		$dataTeacher = $this->dataSqlTeacher($sql);//debugValue($dataTeacher,'dataTeacher');
		$totalRow = count($dataTeacher);debugValue($totalRow,'totalRow');
		if($total_row > 0)
		{
			$this->semakPassword($userPassword);
		}
		else
		{
			$errorEmailid = "Wrong Email Address";
			$error++;
		}
		#
		return array($error,$errorEmailid,$errorPassword);
	}
#--------------------------------------------------------------------------------------------------
	function bentukSqlTeacher($userEmailid)
	{
		$sql = "SELECT * FROM tbl_teacher "
		. "\r WHERE teacher_emailid = '" . $userEmailid . "' "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataSqlTeacher($sql)
	{
		$this->_setSql($sql);
		$dataTeacher = $this->getAll();

		return $dataTeacher;		
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
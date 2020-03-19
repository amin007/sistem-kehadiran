<?php

class LoginModel extends Model
{
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	function bentukSqlTeacher($userEmailid)
	{
		$sql = "SELECT * FROM tbl_teacher "
		. "\r WHERE teacher_emailid = '" . $userEmailid . "' "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataSqlTeacher($userEmailid)
	{
		$sql = $this->bentukSqlTeacher($userEmailid);
		$this->_setSql($sql);
		$dataTeacher = $this->getAll();

		return $dataTeacher;
	}
#--------------------------------------------------------------------------------------------------
	public function semakDatabase($userEmailid,$userPassword)
	{
		$dataTeacher = $this->dataSqlTeacher($userEmailid);
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
#--------------------------------------------------------------------------------------------------
#==================================================================================================
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
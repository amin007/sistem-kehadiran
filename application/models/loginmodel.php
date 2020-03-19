<?php

class LoginModel extends Model
{
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	function bentukSqlTeacher($userEmailid)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = "SELECT * FROM tbl_teacher "
		. "\r WHERE teacher_emailid = '" . $userEmailid . "' "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataSqlTeacher($userEmailid)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->bentukSqlTeacher($userEmailid);
		$this->_setSql($sql);
		$dataTeacher = $this->getAll();

		return $dataTeacher;
	}
#--------------------------------------------------------------------------------------------------
	public function semakDatabase($userEmailid,$userPassword)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$dataTeacher = $this->dataSqlTeacher($userEmailid);
		$totalRow = count($dataTeacher);debugValue($totalRow,'totalRow');
		if($total_row > 0)
		{
			$this->semakPassword($dataTeacher,$userPassword);
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
	function semakPassword($dataTeacher,$userPassword)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		foreach($result as $row)
		{
			if(password_verify($userPassword, $row["teacher_password"]))
			{
				$_SESSION["teacher_id"] = $row["teacher_id"];
			}
			else
			{
				$error_teacher_password = "Wrong Password";
				$error++;
			}
		}
		#
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
	public function getNews()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$this->_setSql($sql);
		$articles = $this->getAll();

		if (empty($articles)){ return false; }

		return $articles;
	}
#--------------------------------------------------------------------------------------------------
	public function getArticleById($id)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$this->_setSql($sql);
		$articleDetails = $this->getRow(array($id));

		if (empty($articleDetails)) { return false; }

		return $articleDetails;
	}
#--------------------------------------------------------------------------------------------------
}
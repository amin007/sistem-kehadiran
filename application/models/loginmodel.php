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
	public function semakDatabase($error,$userEmailid,$userPassword,$errorEmailid,$errorPassword)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$result = $this->dataSqlTeacher($userEmailid);
		$totalRow = count($result);//debugValue($totalRow,'totalRow');
		if($totalRow > 0)
		{
			list($error,$errorPassword) =
				$this->semakPassword($error,$result,$userPassword,$errorPassword);
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
	function semakPassword($error,$result,$userPassword,$errorPassword)
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
				$errorPassword = "Wrong Password";
				$error++;
			}
		}
		#
		return array($error,$errorPassword);
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
# semak login untuk admin
#--------------------------------------------------------------------------------------------------
	function bentukSqlAdmin($adminUsername)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = "SELECT * FROM tbl_admin "
		. "\r WHERE admin_user_name = '" . $adminUsername . "' "
		. "";

		return $sql;
	}
#--------------------------------------------------------------------------------------------------
	function dataSqlAdmin($adminUsername)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$sql = $this->bentukSqlAdmin($adminUsername);
		$this->_setSql($sql);
		$dataAdmin = $this->getAll();

		return $dataAdmin;
	}
#--------------------------------------------------------------------------------------------------
	public function semakAdmin($error,$adminUsername,$adminPassword,$errorUsername,$errorPassword)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$result = $this->dataSqlAdmin($adminUsername);
		$totalRow = count($result);debugValue($totalRow,'totalRow');
		if($totalRow > 0)
		{
			list($error,$errorPassword) =
				$this->semakPasswordAdmin($error,$result,$adminPassword,$errorPassword);
		}
		else
		{
			$errorUsername = "Wrong Password";
			$error++;
		}
		#
		return array($error,$errorUsername,$errorPassword);//*/
	}
#--------------------------------------------------------------------------------------------------
	function semakPasswordAdmin($error,$result,$adminPassword,$errorPassword)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		foreach($result as $row)
		{
			if(password_verify($adminPassword, $row["admin_password"]))
			{
				$_SESSION["admin_id"] = $row["admin_id"];
			}
			else
			{
				$errorPassword = "Wrong Password";
				$error++;
			}
		}
		#
		return array($error,$errorPassword);
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
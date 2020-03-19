<?php

class LoginController extends Controller
{
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	protected $_tajukModulDaa = 'Halaman Login';
#--------------------------------------------------------------------------------------------------
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
	}
#--------------------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			//$this->_setView('index');# nama fail di View
			# Used to define the page title
			$this->_view->set('title', $this->_tajukModulDaa);
			$this->_view->set('tajukModul', 'Ini Dashboard Utama');
			$this->_view->set('action', '&nbsp;...&nbsp;');
			//*/
			return $this->_view->output();
		} catch (Exception $e) {
			echo "Application error:" . $e->getMessage();
		}
	}
#--------------------------------------------------------------------------------------------------
	public function masuk()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
	}
#--------------------------------------------------------------------------------------------------
	public function daftar()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
	}
#--------------------------------------------------------------------------------------------------
	public function teacher()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			//$this->_setView('index');# nama fail di View
			# Used to define the page title
			$this->_view->set('title', $this->_tajukModulDaa);
			//*/
			return $this->_view->output();
		} catch (Exception $e) {
			echo "Application error:" . $e->getMessage();
		}
	}
#--------------------------------------------------------------------------------------------------
	public function admin()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	public function checkteacher()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		#------------------------------------------------------------------------------------------
		$teacher_emailid = '';
		$teacher_password = '';
		$error_teacher_emailid = '';
		$error_teacher_password = '';
		$error = 0;

		if(empty($_POST["teacher_emailid"]))
		{
			$error_teacher_emailid = 'Email Address is required';
			$error++;
		}
		else
		{
			$teacher_emailid = $_POST["teacher_emailid"];
		}

		if(empty($_POST["teacher_password"]))
		{
			$error_teacher_password = 'Password is required';
			$error++;
		}
		else
		{
			$teacher_password = $_POST["teacher_password"];
		}
		#------------------------------------------------------------------------------------------
		$this->semakError($error,$error_teacher_emailid,$error_teacher_password);
		#------------------------------------------------------------------------------------------
	}
#--------------------------------------------------------------------------------------------------
	function semakError($error,$error_teacher_emailid,$error_teacher_password)
	{
		if($error > 0)
		{
			$output = array(
				'error'	=> true,
				'error_teacher_emailid'	=> $error_teacher_emailid,
				'error_teacher_password' => $error_teacher_password
			);
		}
		else
		{
			$output = array('success' => true);
		}

		echo json_encode($output);
		#
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}
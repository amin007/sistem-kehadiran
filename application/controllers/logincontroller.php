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
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	public function checkteacher()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		#------------------------------------------------------------------------------------------
		$errorEmailid = $errorPassword = '';
		$error = 0;

		#------------------------------------------------------------------------------------------
		list($error,$errorEmailid,$errorPassword,$userEmailid,$userPassword)
			= $this->semakPost($error,$errorEmailid,$errorPassword);
		if($error == 0)
			list($error,$errorEmailid,$errorPassword) =
				$this->_model->semakDatabase($error,$userEmailid,$userPassword,
				$errorEmailid,$errorPassword);
		$this->semakError($error,$errorEmailid,$errorPassword);
		#------------------------------------------------------------------------------------------
	}
#--------------------------------------------------------------------------------------------------
	function semakPost($error,$errorEmailid,$errorPassword)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		$userEmailid = $userPassword = '';

		if(empty($_POST["teacher_emailid"]))
		{
			$errorEmailid = 'Email Address is required';
			$error++;
		}
		else
			$userEmailid = $_POST["teacher_emailid"];

		if(empty($_POST["teacher_password"]))
		{
			$errorPassword = 'Password is required';
			$error++;
		}
		else
			$userPassword = $_POST["teacher_password"];
		#
		return array($error,$errorEmailid,$errorPassword,$userEmailid,$userPassword);
	}
#--------------------------------------------------------------------------------------------------
	function semakError($error,$errorEmailid,$errorPassword)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		if($error > 0)
		{
			$output = array(
				'error'	=> true,
				'error_teacher_emailid'	=> $errorEmailid,
				'error_teacher_password' => $errorPassword
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
#--------------------------------------------------------------------------------------------------
	public function checkadmin()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//debugValue($_POST,'_POST');
		#------------------------------------------------------------------------------------------
		$errorUsername = ''; $errorPassword = '';
		$error = 0;
		#------------------------------------------------------------------------------------------
		list($error,$errorEmailid,$errorPassword,$userName,$userPassword)
			= $this->semakPostAdmin($error,$errorUsername,$errorPassword);
		#------------------------------------------------------------------------------------------
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}
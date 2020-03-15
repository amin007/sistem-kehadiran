<?php

class TeacherController extends Controller
{
#--------------------------------------------------------------------------------------------------
	protected $_tajukModulDaa = 'Teacher Page';
#--------------------------------------------------------------------------------------------------
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
    }
#--------------------------------------------------------------------------------------------------
	# Used to display the home page
	public function index()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			$this->_setView('index-teacher');
			// Used to define the page title
			$this->_view->set('title', $this->_tajukModulDaa);
			$this->_view->set('tajukModul', 'Ini Dashboard Utama');
			$this->_view->set('action', '&nbsp;...&nbsp;');

			return $this->_view->output();
		} catch (Exception $e) {
			$errors[] = $e->getMessage();
			$_SESSION['message'] = $errors;
			$_SESSION['type'] = 'error';

			debugValue($_SESSION, '_SESSION');
			//header('Location: ');
			//exit;
		}
		//*/
	}
#--------------------------------------------------------------------------------------------------
	public function profile()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//*/
	}
#--------------------------------------------------------------------------------------------------
	public function student()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//*/
	}
#--------------------------------------------------------------------------------------------------
	public function attendance()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//*/
	}
#--------------------------------------------------------------------------------------------------
	public function logout()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//*/
	}
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
}
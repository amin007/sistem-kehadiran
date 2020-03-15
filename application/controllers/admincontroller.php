<?php

class AdminController extends Controller
{
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
			$this->_setView('index-admin');
			// Used to define the page title
			$this->_view->set('title', 'Index Page!');

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
	public function grade()
	{
		echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//*/
	}
#--------------------------------------------------------------------------------------------------
	public function teacher()
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
}
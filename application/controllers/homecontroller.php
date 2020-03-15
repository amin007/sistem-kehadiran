<?php

class HomeController extends Controller
{
#--------------------------------------------------------------------------------------------------
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
    }
#--------------------------------------------------------------------------------------------------
	// Used to display the home page
	public function index()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			//$this->_setView('index-mula');
			$this->_setView('index-template');
			// Used to define the page title
			$this->_view->set('title', 'Index Page!');

			return $this->_view->output();
		} catch (Exception $e) {
			$errors[] = $e->getMessage();
			$_SESSION['message'] = $errors;
			$_SESSION['type'] = 'error';

			debugValue($_SESSION, '_SESSION');
			//header('Location: /home');
			//exit;
		}
		//*/
	}
#--------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------
}
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
	# Used to display the home page
	public function index()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			//$this->_setView('index-mula');
			$this->_setView('index-template');
			# Used to define the page title
			$this->_view->set('title', 'Selamat Datang');
			$this->_view->set('email', 'maizatussolehah@gmail.com');
			//$this->_view->set('email', 'tuanna.design@gmail.com');
			$this->_view->set('telefon', '06-762 8046');
			//$this->_view->set('telefon', '001-1234-88888');

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
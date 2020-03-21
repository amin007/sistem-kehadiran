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
			$this->_setView('index-template002');
			# Used to define the page title
			$this->_view->set('title', 'Selamat Datang');
			$this->_view->set('email', 'admin@duduk.mana');
			$this->_view->set('telefon', '001-1234-88888');
			$this->_view->set('tajukH4', 'Get started with online courses');
			$this->_view->set('tajukH1', 'best online<br/>Learning system');

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
	public function about()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			//$this->_setView('index-mula');
			$this->_setView('index-about');
			# Used to define the page title
			$this->_view->set('title', 'Mengenai Kami');

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
	public function student()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			//$this->_setView('index-mula');
			$this->_setView('index-student');
			# Used to define the page title
			$this->_view->set('title', 'Pelajar Kami');

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
	public function area()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			//$this->_setView('index-mula');
			$this->_setView('index-area');
			# Used to define the page title
			$this->_view->set('title', 'Kawasan Kami');

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
#--------------------------------------------------------------------------------------------------
}
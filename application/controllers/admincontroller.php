<?php

class AdminController extends Controller
{
#--------------------------------------------------------------------------------------------------
	protected $_tajukModulDaa = 'Admin Page!';
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
			$this->_setView('index-admin');# nama fail di View
			# Used to define the page title
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
	public function grade()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# guna try catch jika ada masalah
		try {
			$this->_setView('1grade');# nama fail di View
			# mula baca database
			$senarai['grade'] = $this->_model->dataSqlGrade();
			# Used to define the page title
			$this->_view->set('title', $this->_tajukModulDaa);
			$this->_view->set('tajukModul', 'Location & Grade List');
			//$this->_view->set('action', '');
			$this->_view->set('senarai', $senarai);
			//$this->debugValueGrade($senarai);

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
	public function gradeAction()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# guna try catch jika ada masalah
		$_POST['action'] = 'fetch';
		try {
			if(isset($_POST['action'])):
			if($_POST['action'] == 'fetch'):
				# mula baca database
				list($kira,$senarai) = $this->_model->bentukDataGrade();

				$output = array(
				"draw"	=>	intval(1),
				"recordsTotal"	=> 	$kira,//$filtered_rows,
				"recordsFiltered" => $kira,//get_total_records($connect, 'tbl_grade'),
				"data" => $senarai
				);

				echo json_encode($output);
			endif;//if($_POST["action"] == "fetch")
			endif;//if(isset($_POST["action"]))
			#
		} catch (Exception $e) {
			$errors[] = $e->getMessage();
			$_SESSION['message'] = $errors;
			$_SESSION['type'] = 'error';

			debugValue($_SESSION, '_SESSION');
			//header('Location: ');
			//exit;
		}
		//*/
	}#--------------------------------------------------------------------------------------------------
	public function gradeEdit()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# guna try catch jika ada masalah
		$_POST['action'] = 'edit_fetch';
		$_POST['grade_id'] = '1';
		try {
			if(isset($_POST['action'])):
			if($_POST['action'] == 'edit_fetch'):
				# mula baca database
				$id = trim($_POST['grade_id']);
				list($output) = $this->_model->cariGradeById($id);

				echo json_encode($output);
			endif;//if($_POST["action"] == "fetch")
			endif;//if(isset($_POST["action"]))
			#
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
	function debugValueGrade($senarai)
	{
		debugValue($this->_view,'this->_view');
		debugValue($senarai,'senarai');
	}
#--------------------------------------------------------------------------------------------------
	public function teacher()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			$this->_setView('index-admin');# nama fail di View
			# Used to define the page title
			$this->_view->set('title', $this->_tajukModulDaa);
			$this->_view->set('tajukModul', 'Ini Dashboard Guru');
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
	public function student()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			$this->_setView('index-admin');# nama fail di View
			# Used to define the page title
			$this->_view->set('title', $this->_tajukModulDaa);
			$this->_view->set('tajukModul', 'Ini Dashboard Pelajar');
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
	public function attendance()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# mula baca database
		try {
			$this->_setView('index-admin');# nama fail di View
			# Used to define the page title
			$this->_view->set('title', $this->_tajukModulDaa);
			$this->_view->set('tajukModul', 'Ini Dashboard Kedatangan');
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
	public function logout()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		unset($_SESSION);
		session_destroy();

		header('location:' . URL . '');
		//*/
	}
#--------------------------------------------------------------------------------------------------
}
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
		}//*/
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
			//header('Location: ');//exit;
		}//*/
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

				//debugValue($output,'output');
				echo json_encode($output);
			endif;//if($_POST["action"] == "fetch")
			endif;//if(isset($_POST["action"]))
			#
		} catch (Exception $e) {
			$errors[] = $e->getMessage();
			$_SESSION['message'] = $errors;
			$_SESSION['type'] = 'error';

			debugValue($_SESSION, '_SESSION');
			//header('Location: ');//exit;
		}//*/
	}
#--------------------------------------------------------------------------------------------------
	public function gradeEditForm()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# guna try catch jika ada masalah
		//$_POST['action'] = 'edit_fetch';
		//$_POST['grade_id'] = '1';
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
			//header('Location: ');//exit;
		}//*/
	}
#--------------------------------------------------------------------------------------------------
	public function gradeSubmit()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		//$output = array('success' => 'Nama class ini :' . __METHOD__ . '()');
		# untuk debug sahaja
		/*$_POST['action'] = 'Add';
		//$_POST['grade_id'] = '1';
		$_POST['grade_name'] = '11 - B';//*/
		# try catch try {
			$gradeName = '';
			$error_grade_name = '';
			$error = 0;
			#--------------------------------------------------------------------------------------
			if(empty($_POST["grade_name"]))
			{
				//$error_grade_name = 'Grade Name is required';
				$error_grade_name = 'Sila Isi Ya???';
				$error++;
			}
			else
				$gradeName = TRIM($_POST["grade_name"]);
			#--------------------------------------------------------------------------------------
			if($error > 0)
				$output = array(
					'error'	=> true,
					'error_grade_name' => $error_grade_name
				);
			else
			{
				$dataDaa = '<strong>' . $gradeName . '</strong>';
				if($_POST["action"] == "Add")
					$output = $this->_model->insertGrade($gradeName);
				if($_POST["action"] == "Edit")
				{
					$id = trim($_POST['grade_id']);
					$output = $this->_model->updateGrade($id,$gradeName);
				}
			}// end if($error > 0)
			#--------------------------------------------------------------------------------------
			echo json_encode($output);
		/*} catch (Exception $e) {
			$errors[] = $e->getMessage();
			$_SESSION['message'] = $errors;
			$_SESSION['type'] = 'error';

			debugValue($_SESSION, '_SESSION');
			//header('Location: ');//exit;
		}//*/
	}
#--------------------------------------------------------------------------------------------------
	public function gradeDelete()
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		debugValue($_POST,'_POST');
		//$_POST['action'] = 'delete'; $_POST['grade_id'] = '1';
		try {
			$id = trim($_POST['grade_id']);
			$dataDaa = '<strong>' . $id . '</strong>';
			$output = 'Data ' . $dataDaa . ' Deleted Successfully';
			/*if($_POST['action'] == 'delete'):
				$output = $this->_model->deleteGrade($id);
				//$output = 'Data ' . $dataDaa . ' Deleted Successfully';
			endif;// endif($_POST['action'] == 'delete') //*/

			echo $output;
			//echo json_encode($output);
		} catch (Exception $e) {
			$errors[] = $e->getMessage();
			$_SESSION['message'] = $errors;
			$_SESSION['type'] = 'error';

			debugValue($_SESSION, '_SESSION');
			//header('Location: ');//exit;
		}//*/
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
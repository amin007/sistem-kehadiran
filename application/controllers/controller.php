<?php

class Controller
{
#--------------------------------------------------------------------------------------------------
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_view;
	protected $_modelBaseName;
#--------------------------------------------------------------------------------------------------
	public function __construct($model, $action)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# istihar pembolehubah
		$this->_controller = ucwords(__CLASS__);
		$this->_action = $action;
		$this->_modelBaseName = $model;

		# debug
		$failView = ROOT . DS . 'application' . DS . 'views' . DS
		. strtolower($this->_modelBaseName) . DS . $action. '.php';
		//debugValue($failView,'failView1');

		# include fail
		$this->_view = new View($failView);
	}
#--------------------------------------------------------------------------------------------------
	protected function _setModel($modelName)
	{
		$modelName .= 'Model';
		$this->_model = new $modelName();
	}
#--------------------------------------------------------------------------------------------------
	protected function _setView($viewName)
	{
		//echo '<hr>Nama class ini :' . __METHOD__ . '()<hr>';
		# debug
		$failView = ROOT . DS . 'application' . DS . 'views' . DS
		. strtolower($this->_modelBaseName) . DS . $viewName . '.php';
		//debugValue($failView,'failView2');

		$this->_view = new View($failView);
	}
#--------------------------------------------------------------------------------------------------
}
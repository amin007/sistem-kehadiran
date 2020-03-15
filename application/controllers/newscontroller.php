<?php

class NewsController extends Controller
{
#--------------------------------------------------------------------------------------------------
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
	}
#--------------------------------------------------------------------------------------------------
	public function index()
	{
		try {
			/*
			$articles = $this->_model->getNews();
			$this->_view->set('articles', $articles);
			$this->_view->set('title', 'News articles from the database');
			//*/
			return $this->_view->output();
		} catch (Exception $e) {
			echo "Application error:" . $e->getMessage();
		}
	}
#--------------------------------------------------------------------------------------------------
}
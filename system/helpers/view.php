<?php

class View
{
#--------------------------------------------------------------------------------------------------
	protected $_file;
	protected $_data = array();
#--------------------------------------------------------------------------------------------------
	public function __construct($file)
	{
		$this->_file = $file;
	}
#--------------------------------------------------------------------------------------------------
	public function set($key, $value)
	{
		$this->_data[$key] = $value;
	}
#--------------------------------------------------------------------------------------------------
	public function get($key) {
		return $this->_data[$key];
	}
#--------------------------------------------------------------------------------------------------
	public function output($a=null)
	{
		//$this->debugDaa($a);
		if (!file_exists($this->_file)) {
			throw new Exception('<hr>Template ' . $this->_file . ' tidak wujud.<hr>');
		}

		extract($this->_data);
		ob_start();
		include($this->_file);
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
		//*/
    }
#--------------------------------------------------------------------------------------------------
	function debugDaa($a=null)
	{
		echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->semakDaa($a,'a');
		$this->semakDaa($this->_file,'this->_file');
		$this->semakDaa($this->_data,'$this->_data');
	}
#--------------------------------------------------------------------------------------------------
	public function semakDaa($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre>';//*/
		//$this->semakDaa($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#--------------------------------------------------------------------------------------------------
}
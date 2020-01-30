<?php
namespace controller\logic\mobile;
use libs\Template;
use controller\template\mobile;
class Main Extends Mobile
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('mainmodel');
	}
	public function index(){
		$this->initPage();
	}
}
?>

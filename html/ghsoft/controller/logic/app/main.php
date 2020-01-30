<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Main Extends App
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

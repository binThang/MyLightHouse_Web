<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Main Extends Control
{
	private $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('mainmodel');
	}
	public function index(){
		parent::index();
	}
}
?>

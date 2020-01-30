<?php
namespace controller\logic\web;
use libs\Template;
use controller\template\Web;
class Share Extends Web
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('mainmodel');
	}
	public function index($idx){
		$this->idx = $idx;
		$this->initPage('logic/app/board/share.php');
	}
}
?>

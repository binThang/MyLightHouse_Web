<?php
namespace controller\logic\web;
use libs\Template;
use controller\template\Web;
class Main Extends Web
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
	public function push()
	{
		$date = date('H', time());
		if($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
			if($date == 22){
				echo JSON($this->model->push_fun());
			}else{
				echo $date;
			}
		}
	}

}
?>

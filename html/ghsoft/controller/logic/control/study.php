<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Study Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('studymodel');
	}
    public function list($page=1,$idx=null)
    {

    }

}
?>

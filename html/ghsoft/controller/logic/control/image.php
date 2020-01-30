<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Image Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('imagemodel');
	}

    public function insert()
    {
        JSON($this->model->insert());
    }

    public function img()
    {
        $this->data=$this->model->view();
        $this->initPage('logic/control/'.$this->type->class.'/img.php');
    }

}
?>

<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Push Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('pushmodel');
	}

    public function write_push()
    {
        $this->initPage('logic/control/'.$this->type->class.'/push_insert.php');
    }
    public function insert_push()
    {
        JSON($this->model->insert_push());
    }

    public function list($page=1,$idx=null)
    {
		$this->idx = $idx;
		$this->page = $page;
        $this->list=$this->model->list($page);
        $this->initList(['순번', '푸시제목'],'/admin/'.$this->type->class,'푸시 목록');
        $this->initPage('logic/control/'.$this->type->class.'/push_list.php');
    }


}
?>

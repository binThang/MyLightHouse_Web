<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Fun2 Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('fun2model');
	}
    public function list($page=1,$idx=null)
    {
		$this->idx = $idx;
		$this->page = $page;
        $this->list=$this->model->list($page);
        $this->initList(['순번', '제목','관리6'],'/admin/'.$this->type->class,'뻔해도 좋은 목록');
        $this->initPage('logic/control/'.$this->type->class.'/list.php');
    }

	public function view($page=1,$idx=null)
    {
        $this->data=$this->model->view($page,$idx);
        $this->initPage('logic/control/'.$this->type->class.'/view.php');
    }
	public function edit($page=1,$idx=null)
    {
        $this->data=$this->model->view($page,$idx);
        $this->initPage('logic/control/'.$this->type->class.'/update.php');
    }
	public function update()
    {
        JSON($this->model->update());
    }
	public function delete($page = null, $idx)
    {
        JSON($this->model->delete($page = null, $idx));
    }

}
?>

<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Admin Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=9){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('adminmodel');
	}
    public function list($page=1,$idx=null)
    {
        $this->list=$this->model->adminList($page);
        $this->initList(['순번','이름','아이디','권한','생성일','로그인','관리6'],'/admin/'.$this->type->class,'관리자 목록');
        $this->initPage('template/index/list.php');
    }
    public function edit($page=1,$idx=null)
    {
        $this->data=$this->model->adminView($idx);
        $this->initPage('logic/control/'.$this->type->class.'/write.php');
    }
    public function write($page=1,$idx=null)
    {
        $this->initPage('logic/control/'.$this->type->class.'/write.php');
    }
    public function insert($page=1,$idx=null)
    {
        JSON($this->model->adminInsert());
    }
    public function update($page=1,$idx=null)
    {
        JSON($this->model->adminUpdate());

    }
    public function delete($page=1,$idx=null)
    {
        JSON($this->model->adminDelete($page,$idx));

    }
}
?>

<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Notice Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('noticemodel');
	}

    public function write_notice()
    {
        $this->initPage('logic/control/'.$this->type->class.'/notice_insert.php');
    }
    public function insert_notice()
    {
        JSON($this->model->insert_notice());
    }

    public function list($page=1,$idx=null)
    {
		$this->idx = $idx;
		$this->page = $page;
        $this->list=$this->model->list($page);
        $this->initList(['순번', '제목','관리6'],'/admin/'.$this->type->class,'공지사항 목록');
        $this->initPage('logic/control/'.$this->type->class.'/notice_list.php');
    }
	public function view($page=1,$idx=null)
    {
        $this->data=$this->model->view($page,$idx);
        $this->initPage('logic/control/'.$this->type->class.'/view.php');
    }
	public function edit($page=1,$idx=null)
    {
        $this->data=$this->model->view($page,$idx);
        $this->initPage('logic/control/'.$this->type->class.'/notice_insert.php');
    }
	public function update_notice()
	{
		JSON($this->model->update_notice());
	}
	public function delete($page=1,$idx)
    {
        JSON($this->model->del_notice($page=1,$idx));
    }


}
?>

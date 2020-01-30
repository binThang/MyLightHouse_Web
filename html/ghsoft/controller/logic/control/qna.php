<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Qna Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('qnamodel');
	}

    public function list($page=1,$idx=null)
    {
		$this->idx = $idx;
		$this->page = $page;
        $this->list=$this->model->list($page);
        $this->initList(['순번', '제목', '답변','답변1'],'/admin/'.$this->type->class,'문의 & 제안');
        $this->initPage('logic/control/'.$this->type->class.'/list.php');
    }
	public function view($page=1,$idx=null)
    {
        $this->data=$this->model->view($page,$idx);
        $this->initPage('logic/control/'.$this->type->class.'/view.php');
    }
    public function reply_qna()
    {
        JSON($this->model->reply_qna());
    }

    // public function edit($page=1,$idx=null)
    // {
    //     $this->data=$this->model->view($page,$idx);
    //     $this->initPage('logic/control/'.$this->type->class.'/notice_insert.php');
    // }
	// public function update_notice()
	// {
	// 	JSON($this->model->update_notice());
	// }
	public function delete($page=1,$idx)
    {
        JSON($this->model->del_qna($page=1,$idx));
    }


}
?>

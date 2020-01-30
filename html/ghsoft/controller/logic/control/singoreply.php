<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class singoreply Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('singoreplymodel');
	}
	public function list($page=1,$idx=null)
    {
		$this->idx = $idx;
		$this->page = $page;
        $this->list=$this->model->list_reply($page);
        $this->initList(['순번', '글 번호', '제목','삭제2'],'/admin/'.$this->type->class,'신고 댓글 관리');
        $this->initPage('logic/control/'.$this->type->class.'/list.php');
    }

    public function view($page=1,$idx=null)
    {
        $this->data=$this->model->view($page,$idx);
        $this->initPage('logic/control/'.$this->type->class.'/view.php');
    }

    public function delete($page = null, $idx, $singo_idx)
	{
		JSON($this->model->delete($page = null, $idx, $singo_idx));
	}

}
?>
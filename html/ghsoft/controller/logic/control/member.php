<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class member Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('membermodel');
	}
    public function list($page=1,$idx=null)
    {
		$this->idx = $idx;
		$this->page = $page;
        $this->list=$this->model->list($page);
		// $this->type = $_SESSION[$this->type->method]['type'];
        $this->initList(['순번', '아이디', '닉네임', '이메일', '번호', '생일', '등급','변경'],'/admin/'.$this->type->class,'회원 관리');
        $this->initPage('logic/control/'.$this->type->class.'/list.php');
    }
	public function list_tony($page=1,$idx=null)
	{
		$this->idx = $idx;
		$this->page = $page;
		$this->list=$this->model->list_tony($page);
		$this->initList(['순번', '아이디', '닉네임', '이메일', '번호', '생일', '등급','변경'],'/admin/'.$this->type->class,'회원 관리');
		$this->initPage('logic/control/'.$this->type->class.'/list.php');
	}

    public function update_tony()
	{
		JSON($this->model->update_tony());
	}

    public function insert_text()
	{
		JSON($this->model->insert_text());
	}


}
?>

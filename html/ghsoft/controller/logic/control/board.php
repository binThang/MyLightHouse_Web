<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Board Extends Control
{
	private $model = null;
	public function __construct()
	{
        if($_SESSION['admin_type']!=7){
			$this->error(404);
			exit();
		}
        parent::__construct();
        $this->model = $this->loadModel('boardmodel');
	}
    public function list($page=1,$idx=null)
    {
        $this->list=$this->model->list($page);
        $this->initList(['순번', '게시물','관리6'],'/admin/'.$this->type->class,'관리자 목록');
        $this->initPage('logic/control/'.$this->type->class.'/list.php');
    }
    public function write_category($page=1,$idx=null)
    {
        $this->initPage('logic/control/'.$this->type->class.'/insert_category.php');
    }
    public function insert_category()
    {
        JSON($this->model->insert_category());
    }
    public function write_hashtag($page=1,$idx=null)
    {
        $this->list=$this->model->select_category();
        $this->initPage('logic/control/'.$this->type->class.'/insert_hashtag.php');
    }
    public function insert_hashtag()
    {
        JSON($this->model->insert_hashtag());
    }
	public function write_backimg($page=1,$idx=null)
	{
		$this->initPage('logic/control/'.$this->type->class.'/insert_backimg.php');
	}
	public function insert()
	{
		JSON($this->model->insert_backimg());
	}
	public function show_hashtag()
	{
		JSON($this->model->show_hashtag());
	}
	public function del_hashtag()
	{
		JSON($this->model->del_hashtag());
	}


}
?>

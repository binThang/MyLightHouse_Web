<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Back Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('backmodel');
    	$this->model->member_idx($this->member_idx);
	}
	public function list($kind, $idx=1)
    {
		$this->list = $this->model->boardList($kind, $idx);
    	$this->initPage('logic/app/board/list1.php');
	}
	public function list2($kind, $idx=1,$page = 1)
  	{
		$this->list = $this->model->boardList($kind, $idx, $page);
    	require VIEW.'logic/app/board/board_list.php';
	}

	public function write()
	{
		// $this->category = $this->model->select_category();
		$this->backimg = $this->model->select_backimg();
		$this->initPage('logic/app/board/write.php');
	}
	public function tony()
	{
		// $this->category = $this->model->select_category();
		$this->backimg = $this->model->select_backimg();
		$this->initPage('logic/app/board/write.php');
	}
	public function view($idx,$array=null)
	{
		$_SESSION['idx']=($array)?explode(',',$array):$_SESSION['idx'];
		$this->view = $this->model->view($idx);
		$this->favoritereplycon = $this->model->favoriteReplyCon($idx);
		$this->replylist = $this->model->list_reply($idx);
		$this->myboard = $this->model->myboard($idx);
		$this->initPage('logic/app/board/view.php');
	}
	public function select_category()
	{
		JSON($this->model->select_category());
	}
	public function select_hashtag()
	{
		JSON($this->model->select_hashtag());
	}
	public function select_gallery()
	{
		JSON($this->model->select_gallery());
	}
	public function insert_board()
	{
		JSON($this->model->insert_board());
	}
	public function favorite()
	{
		JSON($this->model->favorite());
	}
	public function insert_reply()
	{
		JSON($this->model->insert_reply());
	}
	public function singo()
	{
		JSON($this->model->singo());
	}
	public function select_idx($type)
	{
		JSON($this->model->select_idx($type));
	}
	public function reload($idx)
	{
		JSON($this->model->reload($idx));
	}
	public function funreload($idx)
	{
		JSON($this->model->funreload($idx));
	}


	public function share($idx)
	{
		$this->idx = $idx;
		$this->initPage('logic/app/board/share.php');
	}
	public function singo_page()
	{
		require VIEW.'/logic/app/board/singo.php';
	}
	public function update($idx)
	{
		$this->view = $this->model->view($idx);
		$this->initPage('logic/app/board/update.php');
	}
	public function selected_hashtag()
	{
		JSON($this->model->selected_hashtag());
	}
	public function update_board()
	{
		JSON($this->model->update_board());
	}
	public function del_board()
	{
		JSON($this->model->del_board());
	}
	public function update_reload()
	{
		JSON($this->model->update_reload());
	}
	public function select_reply()
	{
		JSON($this->model->select_reply());
	}
	public function update_reply()
	{
		JSON($this->model->update_reply());
	}
	public function del_reply()
	{
		JSON($this->model->del_reply());
	}
	public function del_rereply()
	{
		JSON($this->model->del_rereply());
	}

}
?>

<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Fun Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('funmodel');
		if(!$this->member_idx){
			exit();
		}
		$this->model->member_idx($this->member_idx);
	}
	public function list2($idx,$page = 1)
  	{
		$this->list = $this->model->funList($idx,$page);
		if($idx != 3){
			if($page!=1){
				require VIEW.'logic/app/board/list2_.php';
			}else{
				$this->initPage('logic/app/board/list2.php');
			}
		}
		else{
			if($page!=1){
				require VIEW.'logic/app/board/list1_.php';
			}else{
				$this->initPage('logic/app/board/list2.php');
			}
		}
	}
	// public function list2($idx,$page)
	// {
	// 	$this->list = $this->model->funList($idx,$page);
	//
	// }
	public function list1($idx,$page = null)
	{
		$this->list = $this->model->funList($idx,$page);
    	$this->initPage('logic/app/board/list1.php');

	}
	public function view($idx, $push = null)
    {
		if($push != null){
			$this->push = $push;
		}else{
			$this->push = null;
		}
		// $this->like = $this->model->favorite_check($idx);
		$this->list = $this->model->funView($idx);
		$this->view = $this->model->favoriteReplyCon($idx);
		// $this->reply = $this->model->view_reply($idx);
		$this->replylist = $this->model->list_reply($idx);
		// if(isset($_SESSION['idx'])){
		$this->initPage('logic/app/board/view2.php');
		// }

    }
	public function imgDownload($idx)
	{
		JSON($this->model->imgDownload($idx));
	}
	public function favorite()
	{
		JSON($this->model->favorite());
	}
	public function favorite_check()
	{
		JSON($this->model->favorite_check());
	}
	public function insert_reply()
	{
		JSON($this->model->insert_reply());
	}
	public function reply_favorite()
	{
		JSON($this->model->reply_favorite());
	}
	public function reply_singo()
	{
		JSON($this->model->reply_singo());
	}
	public function reload($idx)
	{
		JSON($this->model->reload($idx));
	}
}
?>

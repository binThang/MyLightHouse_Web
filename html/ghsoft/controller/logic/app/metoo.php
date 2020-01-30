<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Metoo Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('metoomodel');
		if(!$this->member_idx){
			exit();
		}
		$this->model->member_idx($this->member_idx); 
	}

	public function list($idx, $order=1)
  	{
		$this->list = $this->model->metooList($idx, $order);
		$this->initPage('logic/app/board/list3.php');
	}

	public function list2($idx, $order=1, $page=1)
  	{
		$this->list = $this->model->metooList($idx, $order, $page);
		$this->initPage('logic/app/board/list3_.php');
	}
	
	public function view($idx, $push = null)
   	{
		if($push != null){
			$this->push = $push;
		}else{
			$this->push = null;
		}
		
		$this->list = $this->model->view($idx);
		$this->view = $this->model->favoriteReplyCon($idx);
		// $this->reply = $this->model->view_reply($idx);
		$this->replylist = $this->model->list_reply($idx);
		// if(isset($_SESSION['idx'])){
		if(!$this->list->content_url)
			$this->initPage('logic/app/board/metoo_view.php');
		else
			$this->initPage('logic/app/board/metoo_view2.php');
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


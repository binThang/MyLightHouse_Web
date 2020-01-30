<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Search Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('searchmodel');
    	$this->model->member_idx($this->member_idx);
	}
	public function index()
    {
 		$this->count = $this->model->categoryMain($idx);
    	$this->initPage('logic/app/search/index.php');
	}
	public function noresult()
	{
		$this->initPage('logic/app/search/noresult.php');
	}
	public function result()
	{
		$this->initPage('logic/app/search/result.php');
	}
	public function list($idx, $word ,$page = 1)
	{
 		$this->list = $this->model->category_list($idx, $word,$page);
		$this->initPage('logic/app/search/list.php');
	}
	public function list2($idx=1, $word, $page = 1)
  	{
		$this->list = $this->model->category_list($idx, $word, $page);
    	require VIEW.'logic/app/search/list_.php';
	}

}
?>

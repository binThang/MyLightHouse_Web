<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Diary Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('diarymodel');
    	$this->model->member_idx($this->member_idx);
	}
	public function list($idx = 1)
   {
		$this->list = $this->model->boardList($idx);
	    $this->initPage('logic/app/diary/notice.php');
	}
	public function list2($idx = 1, $page = 1)
	{
		$this->list = $this->model->boardList($idx, $page);
		if($idx != 3){
        	require VIEW.'logic/app/diary/list1_.php';
		}
        else{
    		require VIEW.'logic/app/diary/alert_list.php';
        }
	}
	public function read()
	{
		JSON($this->model->read());
	}

}
?>

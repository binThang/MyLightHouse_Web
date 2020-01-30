<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Customer Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('customermodel');
 	   	$this->model->member_idx($this->member_idx);
	}

	public function select_notice()
  	{
	    JSON($this->model->select_notice());
	}
	public function mail()
  	{
	    JSON($this->model->mail());
	}
	public function select_heppeople()
	{
		JSON($this->model->select_heppeople());
	}
	public function select_close()
	{
		JSON($this->model->select_close());
	}
    	public function give_me_book()
	{
        	JSON($this->model->give_me_book());
    	}
}
?>

<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdClass;
class Agree Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->model = $this->loadModel('agreemodel');
    	$this->model->member_idx($this->member_idx);
	}
    public function agree1()
  	{
	    JSON($this->model->agree1());
	}
    public function agree2()
    {
        JSON($this->model->agree2());
    }

}
?>

<?php
namespace controller\logic\control;
use libs\Template;
use controller\template\Control;
use stdClass;
class Logout Extends Control
{
	private $model = null;
	public function __construct()
	{
		parent::__construct();
	}
    public function index()
    {
        parent::logout();
    }
}
?>

<?php
namespace controller\logic\web;
use libs\Template;
use controller\template\Web;
class Upload Extends Web
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
	}
	public function image(){
    JSON(upload('image'));
	}
}
?>

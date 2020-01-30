<?php
namespace controller\logic\app;
use libs\Template;
use controller\template\App;
use stdCslass;
class Upload Extends App
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();
	}
	public function image(){
 	   	ini_set('gd.jpeg_ignore_warning', true);
		JSON(upload('image'));
	}
}
?>


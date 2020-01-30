<?php
namespace controller\logic\index;
use libs\Controller;
use libs\Template;
class Exception Extends Controller
{
	public function __construct($type)
	{
		parent::__construct();
		switch ($type) {
			case 'fatal':
				// $this->insertError();
				$this->error('500');
				break;
			default:
				$this->error('404');
				break;
		}
	}
}
?>

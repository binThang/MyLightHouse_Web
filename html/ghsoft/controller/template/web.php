<?php
namespace controller\template;
use libs\Controller;
use libs\Template;
class Web Extends Controller
{
	use Template {
        Template::__construct as private __templateConstruct;
    }
	private $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->__templateConstruct();
		$this->model = $this->loadModel('Webmodel', 'template');
	}
}
?>

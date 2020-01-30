<?php
namespace libs;
use stdClass;
trait Template
{
	public $template_model = null;
	public function __construct() {
		$this->template_model = $this->loadModel('Templatemodel', 'template');
	}
	public function initPage($url=null){
		if($_POST['type']!='ajax'){
			$this->fullPage($url);
		}else{
			$this->loadPage($url);
		}
	}
	private function fullPage($url)
	{
		switch ($GLOBALS['project']) {
			case 'web':
				$template=WEB_T;
				break;
			case 'control':
				$template=CONTROL_T;
				break;
			case 'mobile':
				$template=MOBILE_T;
				break;
			case 'app':
				$template=APP_T;
				break;
		}
		require VIEW.$template."index.php";
	}
	public function loadPage($url)
	{
		if($url){
			require VIEW.$url;
		}else{
			switch ($GLOBALS['project']) {
				case 'web':
					$template=WEB;
					break;
				case 'control':
					$template=CONTROL;
					break;
				case 'mobile':
					$template=MOBILE;
					break;
				case 'app':
					$template=APP;
					break;
			}
			include VIEW.$template.$this->type->class."/index.php";
		}
	}
    protected function insertError()
    {
        echo 'aa';
    }
}
?>

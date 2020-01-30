<?php
namespace controller\template;
use libs\Controller;
use libs\Template;
class App Extends Controller
{
	use Template {
        Template::__construct as private __templateConstruct;
    }
	public $model = null;
	public function __construct()
	{
		parent::__construct();
		$this->__templateConstruct();
		$this->model = $this->loadModel('Appmodel', 'template');
		$this->member_idx=$this->model->autoLogin();
		if(!preg_match('/^(member)$/',$this->type->class)){
			$this->loginck();
		}
	}
	private function loginck(){
		if(!$this->member_idx){
		?><script>
			if( /Android/i.test(navigator.userAgent)) {
			   window.lighthouse.out();
		   }else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
			   window.webkit.messageHandlers.out.postMessage('');
		   }
	 	</script>
			<?exit();
		}
	}
}
?>

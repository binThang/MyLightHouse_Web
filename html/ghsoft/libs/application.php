<?php
namespace libs;
class Application
{
	private $project = null;
	private $controller = null;
	private $action = null;
	public function __construct()
	{
		$this->escapingData();
		$cancontroll = false;
		$url = "";
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var(urlencode($url), FILTER_SANITIZE_URL);
		}
		$params = explode('/', urldecode($url));
		$counts = count($params);
		if(explode('/',$_GET['url'])[0]=='admin'){
		 	$this->project = 'control';
			array_shift($params);
			$counts = count($params);
		}else if (preg_match('/(gh_mobile)/i',$_SERVER['HTTP_USER_AGENT'])){
			$this->project = 'app';
		}else if (checkDevice()) {
			$this->project = 'mobile';
		}else{
			$this->project = 'web';
		}
		$this->controller =($params[0])?$params[0]:"main";
		$this->action = ($params[1])?$params[1]:"index";
		if (! isset($GLOBALS['project'])){
			$GLOBALS['project'] = $this->project;
		}
		if (! isset($GLOBALS['class'])){
			$GLOBALS['class'] = $this->controller;
		}
		if (! isset($GLOBALS['method'])){
			$GLOBALS['method'] = $this->action;
		}
		$dir = '\\controller\\logic\\' . $this->project . '\\' . $this->controller;
		$loc = '/controller/logic/' . $this->project . '/' . $this->controller . '.php';
		$src = '/controller/logic/' . $this->project;
		$control = $this->error($src, $loc, $dir);
		if ($control) {
			$this->controller = new $dir();
			if (method_exists($this->controller, $this->action)) {
				if ($counts < 3) {
					$this->controller->{$this->action}();
				} else {
					$param_info = Array();
					for ($i = 2; $i < $counts; $i++) {
						$param_info[] = $params[$i];
					}
					call_user_func_array(Array($this->controller, $this->action), $param_info);
				}
			} else {
				$error = new \controller\logic\index\Exception(false);
			}
		}else{
			$error = new \controller\logic\index\Exception(false);
		}
	}
	public function error($src, $loc, $dir)
	{
		if (is_dir(ROOT.'/'.$src)) {
			if (file_exists(ROOT.'/'.$loc)) {
				if (class_exists($dir, true)) {
					return true;
				}
			}
		}
		return false;
	}
	//lt gt
	public function escapingData()
	{
		if (isset($_POST))
			$_POST = replace_data($_POST);
		if (isset($_GET))
			$_GET = replace_data($_GET);
		if (isset($_FILES))
			$_FILES = replace_data($_FILES);
	}
}

?>

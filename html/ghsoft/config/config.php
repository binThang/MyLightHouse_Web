<?php
session_start();
error_reporting(E_ERROR|E_WARNING|E_PARSE);
register_shutdown_function('fatalError');
ini_set("display_errors", 1);//개발용
define('URL', $_SERVER['HTTP_HOST']);
define('DB_TYPE', 'mysql');
define("DB_HOST", "127.0.0.1");
define("DB_NAME", "lighthouse");
define("DB_USER", "root");
define("DB_PASS", "HJHeLZzEFTnV9cgc");
define("GOOGLE_API_KEY", "AAAAkSZ5L7Y:APA91bGnm6vWaaf5hocK4bhoorQJRaNiyCNZBtH-km5jaNb-jtAdziEhtbqoaatsJt8H2iSlpY2loOfg2cDJnlGze3D0QuQmZ2daUAdTn96tD1XyQfvfl2wNf12t_P9tIQeBYDxg7qV0");
define("IOS_API_KEY", "AAAA5ZD6oN4:APA91bF1SaIBqfiePkCqSZ_sJ_8lpXfCQtVzOjYcOBRJn5WkVmpkniiNrfS-7tk1NPWGmGX7yuPRXrVGScc1WOGTiGtjw1IOw_Ntf-fnHyDvZ9S2h5cLpisakU7GsxZCciSTKP8YFuqr");
define("COOKIE",md5("_cookie"));
define("ROOT","ghsoft");
preg_match('/gh_mobile\{+[a-zA-Z0-9\-\_\:]*\}/i',$_SERVER['HTTP_USER_AGENT'],$token);
$token=preg_replace('/(gh_mobile|\{|\})/i','',$token[0]);
define("TOKEN",$token);

define("SMSID", "lighthouse4us");
define("SMSCERT", "5ecf55ebfb4a8f67f7f2ac9892a6a9f5");
define("PHONE1", "070");
define("PHONE2", "4405");
define("PHONE3", "8033");

define("TITLE",'내등에기대');
define("NAME",'lighthouse');
define("TESTING",'?'.date('YmdHis'));
define("VIEW", ROOT."/views/");
define("CONTROLLER", ROOT."/controller/");
define("MODEL", ROOT."/models/");

define("WEB_T", "template/web/");
define("MOBILE_T", "template/mobile/");
define("APP_T", "template/app/");
define("CONTROL_T", "template/control/");
define("INDEX_T", "template/index/");

define("WEB", "logic/web/");
define("MOBILE", "logic/mobile/");
define("APP", "logic/app/");
define("CONTROL", "logic/control/");
define("INDEX", "logic/index/");

?>

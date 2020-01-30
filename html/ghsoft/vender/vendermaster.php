<?php
require 'smarty/libs/Smarty.class.php';
require_once 'image/class.image.php';
$smarty = new Smarty();
$smarty->compile_dir = 'ghsoft/vender/smarty/templates_c';
$smarty->cache_dir = 'ghsoft/vender/smarty/cache_dir';
$smarty->config_dir = 'ghsoft/vender/smarty/config';
require 'snoopy/snoopy.php';
$snoopy = new Snoopy();
?>
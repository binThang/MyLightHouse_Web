<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no">
<title><?=TITLE;?></title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link href="//cdn.globalhu.kr/css/base_m.css<?=TESTING?>" rel="stylesheet" type="text/css">
<link href="/public/template/app/css/common.css<?=TESTING?>" rel="stylesheet" type="text/css">
<!--ios-->
<?php if(preg_match('/iphone/i',$_SERVER['HTTP_USER_AGENT'])){
?><link href="/public/template/app/css/ios.css<?=TESTING?>" rel="stylesheet" type="text/css"><?php
}
if(file_exists($_SERVER['DOCUMENT_ROOT']."/public/logic/app/css/".$this->type->class.".css")){
?>
<link href="/public/logic/app/css/<?=$this->type->class?>.css" rel="stylesheet" type="text/css">
<?php } ?>
<script src="/public/template/index/js/jquery-2.2.4.min.js"></script>
<?php
if(file_exists($_SERVER['DOCUMENT_ROOT']."/public/logic/app/js/".$this->type->class.".js")){
?>
<script src="/public/logic/app/js/<?=$this->type->class?>.js"></script>
<?php } ?>

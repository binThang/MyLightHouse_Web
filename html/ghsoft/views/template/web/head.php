<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scalable=no">

<!-- kakao -->
<meta property="og:image" content="/public/template/index/img/<?=NAME;?>-256x256.png">

<!-- window -->
<meta name="msapplication-TileImage" content="/public/template/index/img/<?=NAME;?>-144x144.png">
<meta name="msapplication-TileColor" content="#1447ef">

<!-- ios -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="<?=NAME;?>">
<link rel="apple-touch-icon" href="/public/template/index/img/<?=NAME;?>-144x144.png">

<title><?=TITLE;?></title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="//cdn.globalhu.kr/css/base_pc.css" type="text/css">
<link rel="stylesheet" href="/public/template/web/css/function.css" type="text/css">
<link rel="manifest" href="/public/template/index/js/manifest.json">
<script src="//cdn.globalhu.kr/js/common.js"></script>
<script src="/public/template/web/js/function.js"></script>
<script src="/public/template/index/js/jquery-2.2.4.min.js"></script>
<?php if($_SERVER['HTTPS'] ){ ?>
<script src="/public/template/index/js/pwa.js<?=TESTING;?>"></script>
<script src="/public/template/index/js/app.js<?=TESTING;?>" async></script>
<script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
<?php } ?>
<script src="/public/template/web/js/index.js"></script>

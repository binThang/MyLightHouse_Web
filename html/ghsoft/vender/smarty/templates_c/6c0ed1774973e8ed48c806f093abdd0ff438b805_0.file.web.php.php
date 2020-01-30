<?php
/* Smarty version 3.1.30, created on 2017-08-01 14:58:31
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/services/web.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59801887545729_01203947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c0ed1774973e8ed48c806f093abdd0ff438b805' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/services/web.php',
      1 => 1501567094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59801887545729_01203947 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="service web">
  <article class="visual">
    <h2 class="behind">비쥬얼</h2>
    <div class="container">
      <div class="visual_txt">
        <h3>what we do.</br>our wervices.</h3>
        <p>design / development / website / application</p>
      </div>
    </div>
  </article>
  <div class="title_line"></div>
  <article class="content c1">
    <div class="container">
      <h2 class="title">responsive website ?</h2>
      <p class="desc">
        PC, 태블릿, 모바일 기기 등 어떠한 디바이스에서든지 스크린 크기에 맞춰진 해상도에 자동으로 변경되는 홈페이지를 말합니다.
        </br></br>
        현재 대부분의 홈페이지는 PC와 모바일 스크린(해상도)의 크기가 다르기 때문에 모바일 웹의 경우 PC 웹과 달리 </br>작은 스크린에 모든 내용을 담을 수 없어 모바일 환경에 맞춰진 별도의 홈페이지를 제작합니다. </br> 제작 비용이 많아지면서 제작기간도 길어지고 두 가지 버전을 따로 관리해야 한다는 단점이 있지만 이런 불편한 점은 반응형 홈페이지 하나로 해결할 수 있습니다. </br>모니터의 종류와 크기부터 스마트 기기까지 다양한 종류가 개발돼 스크린(해상도) 사이즈가 모두 제각각으로 다르기 때문에 </br>어느 하나에 최적화하여 홈페이지를 제작하기 어려워 반응형 홈페이지로 제작하는 것이 좋습니다.
      </p>
    </div>
  </article><!--//content.c1-->
  <article class="content c2">
    <div class="container">
      <strong>production</br>process</strong>

    </div>
  </article><!--//content.c2-->
  <article class="content c3">contentc3</article><!--//content.c3-->
</section>
<?php echo '<script'; ?>
>
  $(window).resize(function(){
      $('article').height($(window).height());
  });
  $('article').height($(window).height());
<?php echo '</script'; ?>
>

<!-- description
<pre>
[menu]
SERVICES -> WEB

[title]
Web

[link]
/index/services
/index/services/web

[controller]
ghsoft/controller/logic/index/services.php

[model]
ghsoft/models/logic/index/servicesmodel.php

[public]
/public/logic/index/

[css]
/public/logic/index/css/services.css

[js]
/public/logic/index/js/services.js

</pre>
 /description -->
<?php }
}

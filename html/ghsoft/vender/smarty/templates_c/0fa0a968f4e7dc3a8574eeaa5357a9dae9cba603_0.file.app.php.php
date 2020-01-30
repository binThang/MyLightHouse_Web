<?php
/* Smarty version 3.1.30, created on 2017-08-01 14:46:29
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/services/app.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598015b53ddb13_61895839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0fa0a968f4e7dc3a8574eeaa5357a9dae9cba603' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/services/app.php',
      1 => 1501566375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598015b53ddb13_61895839 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="service app">
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
      <h2 class="title">application</h2>
      <p class="desc">
        현재 온라인 시장 거래액에 5조 원을 넘은 시점에서 50% 이상의 거래액이 모바일 기기를 이용해 </br>소비를 이루어지고 있을만큼 스마트폰을 활용한 소비가 해마다 점점 늘어가고 있습니다.
        </br></br>
        지속적으로 성장하는 모바일시장에서 앞서 나갈 수 있는 아이템이 바로 </br>어플리케이션이고 이제 어플리케이션은 선택이 아닌 필수입니다.
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

[menu]
SERVICES -> APP

[title]
App

[link]
/index/services
/index/services/app

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

/description -->
<?php }
}

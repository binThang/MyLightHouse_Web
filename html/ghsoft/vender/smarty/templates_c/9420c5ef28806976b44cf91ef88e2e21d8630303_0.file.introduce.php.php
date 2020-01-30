<?php
/* Smarty version 3.1.30, created on 2017-08-01 14:38:30
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/aboutus/introduce.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598013d6e84f71_92310237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9420c5ef28806976b44cf91ef88e2e21d8630303' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/aboutus/introduce.php',
      1 => 1501565909,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598013d6e84f71_92310237 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="aboutus_wrap">
  <article class="visual">
    <h2 class="behind">비쥬얼</h2>
    <div class="container">
      <div class="visual_txt">
        <h3>global humanism</br>for your brand.</h3>
        <p>introduce global humanism agency</p>
      </div>
    </div>
  </article>
  <div class="title_line"></div>
  <article class="content c1">
    <div class="container">
      <h2 class="title">how about here ?</h2>
      <p class="desc">" 저희 GH는 기업과 고객들 간의 합리적이고 효율적인 커뮤니케이션 장을 마련해 드림으로서 </br> 비용과 시간의 소비를 줄이고 업무의 누스를 방지하는데 최선의 노력을 하고 있으며,</br> 정확한 컨설팅으로 고객만족을 추구하고자 다양하고 전문적인 사업들을 수행하고 있습니다. "</p>
      <ul class="hashtag">
        <li><a href="#none">#experience</a></li>
        <li><a href="#none">#insight</a></li>
        <li><a href="#none">#success</a></li>
      </ul>
      <p class="line"></p>
      <figure><img src="/public/logic/index/img/about_us01.jpg" alt="배경이미지"></figure>
    </div>
  </article><!--//content.c1-->
  <article class="content c2">
    <div class="container">
      <strong>realize</br>one's value</strong>

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
ABOUT US

[title]
회사소개

[link]
/index/aboutus
/index/aboutus/introduce

[controller]
ghsoft/controller/logic/index/aboutus.php

[model]
ghsoft/models/logic/index/aboutusmodel.php

[public]
/public/logic/index/

[css]
/public/logic/index/css/aboutus.css

[js]
/public/logic/index/js/aboutus.js


 /description -->
<?php }
}

<?php
/* Smarty version 3.1.30, created on 2017-08-01 18:17:14
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/home/welcome.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5980471a424815_28695477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '757e31e6af86d2900c7e2493d2ecb19e4c2ddd59' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/home/welcome.php',
      1 => 1501579033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5980471a424815_28695477 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="main_wrap">
  <article class="visual">
    <h2 class="behind">비쥬얼</h2>
    <div class="slide_wrap">
      <ul>
        <li><img src="/public/logic/index/img/main_visual01.jpg" alt="visual slide img"></li>
        <li><img src="/public/logic/index/img/main_visual02.jpg" alt="visual slide img"></li>
        <li><img src="/public/logic/index/img/main_visual03.jpg" alt="visual slide img"></li>
      </ul>
    </div>
    <div class="container">
      <p class="right_txt">Global Humanisu </br>for your Brand.</p>
      <ul class="btm_txt">
        <li class="txt1">New</br>Creative</br>Brand</li>
        <li class="txt2">Marketing &nbsp; /&nbsp; Planning &nbsp;/&nbsp; Experience Design</li>
      </ul>
      <ul class="control">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
      </ul>
    </div><!--//container -->
  </article><!--//visual -->
  <article class="content c1">
    <h2 class="title">welcome</h2>
    <div class="container">
      <div class="right_box">
        <figure><img src="/public/logic/index/img/main01.jpg" alt="what we do 꾸밈요소 이미지"></figure>
      </div>
      <div class="left_box">
        <strong>what</br>we</br>do</br></strong>
        <p class="line"></p>
        <p class="desc">전문적 지식과 경험을 토대로 최고의 품질을 서비스하기 위해 노력합니다.</br>
        IT 사업분야의 통찰력을 바탕으로 성공파트너로서의 임무를 수행합니다.</br>성공적인 브랜드 이미지 구축과 성공적인 E-BUSINESS를 이끄는 서비스를 목표로 합니다.</p>
      </div>
    </div>
  </article><!--//content c1-->
  <article class="content c2">
    <h2 class="behind">content c2</h2>
    <div class="container">
      <strong>our</br>service</strong>
      <div class="square">
        <div class="box1">
          <figure class="txt_img"><img src="/public/logic/index/img/main02.jpg" alt="배경이미지"></figure>
          <div class="txt_box">
            <dl class="">
              <dt>01. Counselling</dt>
              <dd>App 개발에 꼭 필요하지만 아무나 할 수 없는 </br>기획 미팅 &amp; 기술미팅을 GH에서만 지원합니다. </dd>
            </dl>
            <dt>02. Story board</dt>
            <dd>제작하려는 APP이 만들어지는 과정을</br> 확인할 수 있도록 약식 스토리보드를 지원합니다.</dd>
          </dl>
          </div>
        </div><!--//top_box-->
        <div class="box2">
          <div class="txt_box">
            <dl class="">
              <dt>03. App Store</dt>
              <dd>공식 APP 스토어에 등록 서비스를 지원해드립니다.</dd>
            </dl>
            <dt>04. Template</dt>
            <dd>차세대 하이브리드 웹, 앱 프리미엄 템플릿을 제공해드립니다. </dd>
          </dl>
          </div>
          <figure class="txt_img"><img src="/public/logic/index/img/main03.jpg" alt="배경이미지"></figure>
        </div>
        <p class="line"></p>
      </div>
    </div><!--//container-->
  </article><!--//content c2-->
  <article class="content c3">
    <h2 class="behind">content c3</h2>
    <div class="container">
      <ul class="date">
        <li>
          <p>2016</p>
          <span>START GH</span>
        </li>
        <li>
          <p>58</p>
          <span>PROJECT</span>
        </li>
        <li>
          <p>23</p>
          <span>MEMBER</span>
        </li>
      </ul>
    </div>
  </article><!--//content c3-->
  <aside class="quick">
    <h3 class="behind">quick menu</h3>
    <ul>
      <li>
          <a href="#" title="견적문의로 이동">
            <p>C</p>
            견적문의
        </a>
      </li>
      <li>
          <a href="#" title="실시간 상담으로 이동">
            <p class="icon"><img src="/public/logic/index/img/icn_cmt.png" alt="실시간 상담 아이콘"></p>
            실시간 상담
          </a>
      </li>
      <li class="tel">
          <a href="#" title="전화걸기">
            1522 .</br>&nbsp;&nbsp;8717
          </a>
      </li>
    </ul>
  </aside><!--//quick -->
</section><!--//main_wrap -->
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
HOME

[title]
Welcome PAGE 메인

[link]
/
/index
/index/home
/index/home/index
/index/home/welcome

[controller]
ghsoft/controller/logic/index/home.php

[model]
ghsoft/models/logic/index/homemodel.php

[public]
/public/logic/index/

[css]
/public/logic/index/css/home.css

[js]
/public/logic/index/js/home.js

 //description -->
<?php }
}

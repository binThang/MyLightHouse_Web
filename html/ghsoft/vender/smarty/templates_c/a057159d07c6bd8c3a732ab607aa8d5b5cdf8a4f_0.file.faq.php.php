<?php
/* Smarty version 3.1.30, created on 2017-08-02 10:10:16
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/notice/faq.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598126789e09d3_52339761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a057159d07c6bd8c3a732ab607aa8d5b5cdf8a4f' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/notice/faq.php',
      1 => 1501636084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598126789e09d3_52339761 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="notice">
  <article class="faq_wrap">
    <h2 class="behind">faq</h2>
    <div class="container">
      <table class="tb_wrap">
        <caption class="behind"> faq table</caption>
        <colgroup>
          <col style="width:20%;">
          <col style="width:*">
          <col style="width:5%">
        </colgroup>
        <thead>
          <tr>
            <th scope="col">category</th>
            <th scope="col" colspan='2'>title</th>
          </tr>
        </thead>
        <tbody>
          <!--[D] : 개발하실 때 태그 열고닫고 줄 맞춰주세요.. ㅠㅠ -->
          <tr class="question">
            <td>app</td>
            <td class="title"><a href="#none">홈페이지가 없어도 어플을 만들 수있나요? </a></td>
            <td class="more"> - </td>
          </tr>
          <tr class="answer">
            <td colspan='3'>
              <p>운영중인 홈페이지가 없어도 제공해 드리는 기본 템플릿으로 어플리케이션 제작이 가능하며, 홈페이지를 제작하여 어플리케이션으로 사용 할 수 있습니다.</p>
            </td>
          </tr>
          <tr class="question">
            <td>app</td>
            <td class="title"><a href="#none">홈페이지가 없어도 어플을 만들 수있나요? </a></td>
            <td class="more"> + </td>
          </tr>
          <tr class="answer">
            <td colspan='3'>
              <p>운영중인 홈페이지가 없어도 제공해 드리는 기본 템플릿으로 어플리케이션 제작이 가능하며, 홈페이지를 제작하여 어플리케이션으로 사용 할 수 있습니다.</p>
            </td>
          </tr>
          <tr class="question">
            <td>app</td>
            <td class="title"><a href="#none">홈페이지가 없어도 어플을 만들 수있나요? </a></td>
            <td class="more"> + </td>
          </tr>
          <tr class="answer">
            <td colspan='3'>
              <p>운영중인 홈페이지가 없어도 제공해 드리는 기본 템플릿으로 어플리케이션 제작이 가능하며, 홈페이지를 제작하여 어플리케이션으로 사용 할 수 있습니다.</p>
            </td>
          </tr>
          <tr class="question">
            <td>app</td>
            <td class="title"><a href="#none">홈페이지가 없어도 어플을 만들 수있나요? </a></td>
            <td class="more"> + </td>
          </tr>
          <tr class="answer">
            <td colspan='3'>
              <p>운영중인 홈페이지가 없어도 제공해 드리는 기본 템플릿으로 어플리케이션 제작이 가능하며, 홈페이지를 제작하여 어플리케이션으로 사용 할 수 있습니다.</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div><!--//container -->
  </article><!--//faq_wrap-->
</section>

  <?php echo '<script'; ?>
>
    $(function(){
      $(".answer").not(':first').find('td').css('display','none');
      $(".faq_wrap .tb_wrap").on('click', '.question', function(){
        if( $(this).next().find('td').css("display")=="none")
        {
          $(this).find(".more").html("-");
          $(this).next().find('td').slideDown();
        }else{
          $(this).find(".more").html("+");
          $(this).next().find('td').slideUp();
        }
      });
    });
  <?php echo '</script'; ?>
>


<!--

description
[menu]
NOTICE -> CONSULT

[title]
CONSULT PAGE

[link]
/index/notice/consult

[controller]
ghsoft/controller/logic/index/notice.php

[model]
ghsoft/models/logic/index/noticemodel.php

[public]
/public/logic/index/

[css]
/public/logic/index/css/notice.css

[js]
/public/logic/index/js/notice.js

//description -->
<?php }
}

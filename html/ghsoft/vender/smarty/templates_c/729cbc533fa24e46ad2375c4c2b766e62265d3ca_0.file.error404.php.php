<?php
/* Smarty version 3.1.30, created on 2017-07-31 17:03:02
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/exception/error404.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597ee4367d5e33_59512241',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '729cbc533fa24e46ad2375c4c2b766e62265d3ca' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/exception/error404.php',
      1 => 1501488171,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597ee4367d5e33_59512241 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section  class="error">
  <h2 class="behind">404 error page</h2>
  <article>
    <div class="left_box">
      <div>
          <p class="icon"><img src="/public/logic/index/img/error.png" alt="에러이미지"></p>
          <p>404</p>
          <p>not found</p>
      </div>
    </div><!--//left_box-->
    <div class="right_box">
      <div>
        <p>죄송합니다.</p>
        <p>요청하신 페이지를 찾을 수 없습니다.</p>
        <p>찾으시려는 웹페이지의 이름이 바뀌었거나 현재 사용할 수 없습니다.</br>입력하신 페이지 주소가 정확한지 다시 한번 확인해 주십시오.</p>
        <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
">홈으로 가기</a>
      </div>
    </div><!--//right_box-->
  </article>
</section><!--//error-->
<?php }
}

<?php
/* Smarty version 3.1.30, created on 2017-07-25 16:17:44
  from "/home/hosting_users/globalhu/www/ghsoft/views/template/web/menu.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5976f098509511_89139231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cf3a19e227e32bb9945d0e9db2b6cde5ed742ed' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/template/web/menu.php',
      1 => 1500967064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5976f098509511_89139231 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--menu :: header -->
<div class="header_wrap">
  <div class="header_top">
    <h1><a href="#" title="메인으로 이동"><img src="/public/logic/index/img/logo1.png" alt="글로벌 휴머니즘 로고" class="logo"></a></h1>
    <nav id="global_gnb">
      <ul class="gnb g1">
<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['first']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
		<?php if ($_smarty_tpl->tpl_vars['row']->value->id == 'notice') {?>
		<li class="pdhidden"><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value->link;?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
 메뉴로 이동"><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</a></li>
		<?php } else { ?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value->link;?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
 메뉴로 이동"><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</a></li>
		<?php }?>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }?>
      </ul>
    </nav>
  </div><!--//hedaer-top-->
  <div class="header_btm hidden">
    <ul class="gnb g2">
      <li class="pdhidden"><a href="#">homepage</a></li>
      <li><a href="#">app</a></li>
    </ul>
  </div><!--//header_btm-->
</div><!--//header_wrap-->
<?php }
}

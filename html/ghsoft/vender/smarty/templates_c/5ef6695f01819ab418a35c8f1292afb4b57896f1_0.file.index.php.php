<?php
/* Smarty version 3.1.30, created on 2017-07-31 14:25:34
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/template/web/index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597ebf4eecfe18_43646798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ef6695f01819ab418a35c8f1292afb4b57896f1' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/template/web/index.php',
      1 => 1501478734,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597ebf4eecfe18_43646798 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE  html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Global Humanism</title>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
	<link rel='stylesheet' href='/public/template/web/css/common.css'/>
	<link rel='stylesheet' href='/public/template/web/css/function.css'/> <!-- 템플릿 -->
	<link rel='stylesheet' href='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.css'/> <!-- VIEW -->
	<?php echo '<script'; ?>
 src='/public/jquery-3.2.1.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/public/template/web/js/jquery-ui.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src='/public/template/web/js/function.js'><?php echo '</script'; ?>
> <!-- 템플릿 -->
	<?php echo '<script'; ?>
 src='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/js/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.js'><?php echo '</script'; ?>
> <!-- VIEW -->
</head>
<body>
	<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)) {?>
	<header>
	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	</header>
	<?php }?>
	<!--//header -->
	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)) {?>
	<footer>
	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	</footer>
	<?php }?>
	<!--//footer-->
</body>
</html>
<?php }
}

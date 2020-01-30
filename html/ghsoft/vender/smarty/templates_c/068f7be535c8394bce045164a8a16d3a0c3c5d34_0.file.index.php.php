<?php
/* Smarty version 3.1.30, created on 2017-07-25 16:53:12
  from "/home/hosting_users/globalhu/www/ghsoft/views/template/web/index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5976f8e862d436_21174676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '068f7be535c8394bce045164a8a16d3a0c3c5d34' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/template/web/index.php',
      1 => 1500969189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5976f8e862d436_21174676 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE  html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Global Humanism</title>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
	<link rel='stylesheet' href='/public/template/web/css/function.css'/> <!-- 템플릿 -->
	<link rel='stylesheet' href='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.css'/> <!-- VIEW -->
	<?php echo '<script'; ?>
 src='/public/jquery-2.2.4.min.js'><?php echo '</script'; ?>
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
	<header id="header">
	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	</header>
	<!--//header -->
	<section>
	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	</section>

	<footer id="footer">
	<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	</footer>
	<!--//footer-->
</body>
</html>
<?php }
}

<?php
/* Smarty version 3.1.30, created on 2017-07-20 01:20:46
  from "/host/home1/goodchar/html/app/views/template/basic/index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596f86dee59832_46115999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e4eb65977b1b3baaa80b8ddffcd65beffbed32e' => 
    array (
      0 => '/host/home1/goodchar/html/app/views/template/basic/index.php',
      1 => 1500481238,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596f86dee59832_46115999 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE  html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- width=device-width, initial-scale=1.0, user-scalable=no, height=device-height, maximum-scale=1.0, target-densityDpi=device-dpi -->
	<title></title>
	<link rel="shortcut icon" href="/public/css/favicon.ico" type="image/x-icon">
	<!-- Custom Theme Style -->
	<link rel='stylesheet' href='/public/template/basic/css/function.css'/> <!-- 템플릿 --> 
	<link rel='stylesheet' href='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.css'/> <!-- VIEW -->
</head>
<body>
<section class="frame">
	<article id="nav">
		<nav id="menu" class="frame">
			<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

		</nav>
	</article> 
	<article id="content" name="container">
		<div id="frame">
			<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

		</div>
	</article>
	<article id="footer" class="frame">
		<footer class="footer">
			<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

		</footer>
	</article>
</section>
</div>
<!-- Custom Theme Scripts -->
<div id='scriptappend'>
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-2.2.4.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src='/public/template/basic/js/function.js'><?php echo '</script'; ?>
> <!-- 템플릿 --> 
	<?php echo '<script'; ?>
 src='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/js/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.js'><?php echo '</script'; ?>
> <!-- VIEW -->
</div>
</body>
</html><?php }
}

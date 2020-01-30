<?php
/* Smarty version 3.1.30, created on 2017-07-20 11:28:10
  from "/host/home1/goodchar/html/app/views/template/spectral/index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5970153a20e973_59507109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66e2fe38aa62ebf9e292fb6c3eac7f881db2afa2' => 
    array (
      0 => '/host/home1/goodchar/html/app/views/template/spectral/index.php',
      1 => 1500517687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5970153a20e973_59507109 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE  html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="shortcut icon" href="/public/css/favicon.ico" type="image/x-icon">
	<link rel='stylesheet' href='/public/template/spectral/css/function.css'/> <!-- 템플릿 --> 
	<link rel='stylesheet' href='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.css'/> <!-- VIEW -->
</head>
<body class="landing">
	<!-- Page Wrapper -->
	<div id="page-wrapper">
		<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


		<section id="three" class="wrapper style3 special">
			<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

		</section>

		<!-- Footer -->
		<footer id="footer">
			<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

		</footer>
	</div>
</body>
<div id='scriptappend'>
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-2.2.4.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src='/public/template/spectral/js/function.js'><?php echo '</script'; ?>
> <!-- 템플릿 --> 
	<?php echo '<script'; ?>
 src='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/js/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.js'><?php echo '</script'; ?>
> <!-- VIEW -->
</div>
</html><?php }
}

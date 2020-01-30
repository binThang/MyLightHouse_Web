<?php
/* Smarty version 3.1.30, created on 2017-07-20 17:05:47
  from "/home/hosting_users/globalhu/www/app/views/template/control/index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5970645b7135a9_94637173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9f34d5458121a63d89dfdcad206eb8c03737627' => 
    array (
      0 => '/home/hosting_users/globalhu/www/app/views/template/control/index.php',
      1 => 1500536972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5970645b7135a9_94637173 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE  html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="shortcut icon" href="/public/css/favicon.ico" type="image/x-icon">
	<link rel='stylesheet' href='/public/template/control/css/function.css'/> <!-- 템플릿 --> 
	<link rel='stylesheet' href='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.css'/> <!-- VIEW -->
</head>
<body class="nav-md">
	<div class="container body">
        <div class="main_container">
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
				<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </footer>
            <!-- /footer content -->
        </div>
    </div>
</div>
</body>
<div id='scriptappend'>
	<?php echo '<script'; ?>
 src='/public/jquery-2.2.4.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src='/public/template/control/js/function.js'><?php echo '</script'; ?>
> <!-- 템플릿 --> 
	<?php echo '<script'; ?>
 src='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/js/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.js'><?php echo '</script'; ?>
> <!-- VIEW -->
</div>
</html><?php }
}

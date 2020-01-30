<?php
/* Smarty version 3.1.30, created on 2017-07-25 17:54:06
  from "/home/hosting_users/globalhu/www/ghsoft/views/template/control/index.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5977072e701009_80053757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09c062e5e5c28b63eee55c2373c3e2eaa33e7bcd' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/template/control/index.php',
      1 => 1500972845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5977072e701009_80053757 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE  html>
<html lang="ko">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Page-Enter" content="blendTrans(Duration='0.3')" />
	<meta http-equiv="Page-Exit" content="blendTrans(Duration='0.3')" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Admin</title>
	<link rel="shortcut icon" href="/public/css/favicon.ico" type="image/x-icon">
	<link rel='stylesheet' href='/public/template/control/css/function.css'/> <!-- 템플릿 --> 
	<link rel='stylesheet' href='/public/logic/<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
/css/<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
.css'/> <!-- VIEW -->
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
</head>
<body class="nav-md">
<input type='hidden' id='method' value='<?php echo $_smarty_tpl->tpl_vars['method']->value;?>
'/>
<input type='hidden' id='class' value='<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
'/>
<input type='hidden' id='project' value='<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
'/>
	<div class="container body">
        <div class="main_container">
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['menu']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <!-- /top navigation -->

            <!-- page content -->
			<section>
            <div class="right_col" role="main">
				<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
			</section>
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
</html><?php }
}

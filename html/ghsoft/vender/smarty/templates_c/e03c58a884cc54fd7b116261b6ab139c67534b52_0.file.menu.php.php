<?php
/* Smarty version 3.1.30, created on 2017-07-26 12:13:53
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/template/control/menu.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597808f102e253_79119617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e03c58a884cc54fd7b116261b6ab139c67534b52' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/template/control/menu.php',
      1 => 1501038724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597808f102e253_79119617 (Smarty_Internal_Template $_smarty_tpl) {
?>
			<div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/admin" class="site_title"><img src="/public/template/control/img/logo2.png"></img></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
						<?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value['admin_img'])) {?>
							<img src="<?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['admin_img'];?>
" alt="..." class="img-circle profile_img">
						<?php } else { ?>
							<img src="/public/template/control/img/logo.png" alt="..." class="img-circle profile_img">
						<?php }?>
                            
                        </div>
                        <div class="profile_info">
                            <span>Welcome</span>
						<?php if (isset($_smarty_tpl->tpl_vars['_SESSION']->value['admin_nick'])) {?>
							<h2><?php echo $_smarty_tpl->tpl_vars['_SESSION']->value['admin_nick'];?>
</h2>
						<?php } else { ?>
                            <h2>Administrator</h2>
						<?php }?>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
					
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Control Set</h3>
                            <ul class="nav side-menu">
						<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)) {?>
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['first']->value, 'row1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row1']->value) {
?>
                                <li><a><i class="fa fa-edit"></i> <?php echo $_smarty_tpl->tpl_vars['row1']->value->name;?>
 <span class="fa fa-chevron-down"></span></a>
								<?php if ($_smarty_tpl->tpl_vars['row1']->value->child > 0) {?>
									<ul class="nav child_menu">
								<?php }?>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['second']->value[$_smarty_tpl->tpl_vars['row1']->value->id], 'row2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row2']->value) {
?>
									
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['row2']->value->link;?>
"><?php echo $_smarty_tpl->tpl_vars['row2']->value->name;?>
</a></li>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

								<?php if ($_smarty_tpl->tpl_vars['row1']->value->child > 0) {?>
									</ul>
								<?php }?>
								
                                </li>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						<?php }?>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
					
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="/public/template/control/img/logo.png" alt="">Administrator
								</a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="/admin/basic/logout"><i class="fa fa-sign-out pull-right"></i>로그아웃</a></li>
                                </ul>
                            </li>
							
                        </ul>
                    </nav>
                </div>
            </div><?php }
}

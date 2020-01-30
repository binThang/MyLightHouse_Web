<?php
/* Smarty version 3.1.30, created on 2017-07-20 17:05:47
  from "/home/hosting_users/globalhu/www/app/views/template/control/menu.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5970645b71e1b4_55391532',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea306ad26dfab1a6a71672aaec0d3e508c13e566' => 
    array (
      0 => '/home/hosting_users/globalhu/www/app/views/template/control/menu.php',
      1 => 1500535576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5970645b71e1b4_55391532 (Smarty_Internal_Template $_smarty_tpl) {
?>
			<div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['second']->value, 'row2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row2']->value) {
?>
									<?php if ($_smarty_tpl->tpl_vars['row2']->value->parent == $_smarty_tpl->tpl_vars['row1']->value->idx) {?>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['row2']->value->link;?>
"><?php echo $_smarty_tpl->tpl_vars['row2']->value->name;?>
</a></li>
									<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['row1']->value->child > 0) {?>
									</ul>
								<?php }?>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
                    <!-- /menu footer buttons -->
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
									<img src="images/img.jpg" alt="">John Doe
									<span class=" fa fa-angle-down"></span>
								</a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="javascript:;"> Profile</a></li>
                                    <li>
                                        <a href="javascript:;">
											<span class="badge bg-red pull-right">50%</span>
											<span>Settings</span>
										</a>
                                    </li>
                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-envelope-o"></i>
									<span class="badge bg-green">6</span>
								</a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
                                    </li>
                                    <li>
                                        <a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
                                    </li>
                                    <li>
                                        <a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
                                    </li>
                                    <li>
                                        <a>
											<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
											<span>
												<span>John Smith</span>
												<span class="time">3 mins ago</span>
											</span>
											<span class="message">
												Film festivals used to be do-or-die moments for movie makers. They were where...
											</span>
										</a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
												<strong>See All Alerts</strong>
												<i class="fa fa-angle-right"></i>
										</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div><?php }
}

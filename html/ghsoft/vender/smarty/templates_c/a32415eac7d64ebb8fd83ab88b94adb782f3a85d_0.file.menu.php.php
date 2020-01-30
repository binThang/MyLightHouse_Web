<?php
/* Smarty version 3.1.30, created on 2017-07-20 11:31:09
  from "/host/home1/goodchar/html/app/views/template/horizontal/menu.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597015ed053ef0_44227214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a32415eac7d64ebb8fd83ab88b94adb782f3a85d' => 
    array (
      0 => '/host/home1/goodchar/html/app/views/template/horizontal/menu.php',
      1 => 1500514094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597015ed053ef0_44227214 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<div class="navbar navbar-inverse set-radius-zero" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    LOGO_IMG
                </a>
            </div>
            <div class="right-div">
                <a href="#" class="btn btn-danger pull-right">LOG ME OUT</a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.html" class="menu-top-active">DASHBOARD</a></li>
                            <li><a href="form.html">FORMS</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">UI ELEMENTS <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="ui.html">UI ELEMENTS</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="#">EXAMPLE LINK</a></li>
                                </ul>
                            </li>
                            <li><a href="tab.html">TABS & PANELS</a></li>
                             <li><a href="table.html">TABLES</a></li>
                            <li><a href="blank.html">BLANK PAGE</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><?php }
}

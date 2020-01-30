<?php
/* Smarty version 3.1.30, created on 2017-07-25 14:39:36
  from "/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/category/setting.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5976d998c6ba47_73042129',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68a720248b691cecbab045ea14c74c28cf973f42' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/category/setting.php',
      1 => 1500959978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5976d998c6ba47_73042129 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='category'>
	<div id='service'>
		<h1>서비스</h1>
		<ul class='floor'>
			<li id='title'>
				<span class='idx'>번호</span>
				<span class='title'>이름</span>
			</li>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['service']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<li>
				<span class='idx'><?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
</span>
				<span class='title'><input type='text' id='name' value='<?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
'/></span>
			</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<li id='default' style='display:none;'>
				<span class='idx'></span>
				<span class='title'><input type='text' id='name'/></span>
			</li>
		</ul>
		<input type='hidden' id='table' value='gh_category'/>
		<button type='button' class='add'>추가</button>
		<button type='button' class='del'>제거</button>
		<button type='button' class='mod'>수정</button>
	</div>
	<div id='contact'>
		<h1>문의 종류</h1>
		<ul class='floor'>
			<li id='title'>
				<span class='idx'>번호</span>
				<span class='title'>이름</span>
			</li>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contact_type']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<li>
				<span class='idx'><?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
</span>
				<span class='title'><input type='text' id='name' value='<?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
'/></span>
			</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<li id='default' style='display:none;'>
				<span class='idx'></span>
				<span class='title'><input type='text' id='name'/></span>
			</li>
		</ul>
		<input type='hidden' id='table' value='gh_contact_type'/>
		<button type='button' class='add'>추가</button>
		<button type='button' class='del'>제거</button>
		<button type='button' class='mod'>수정</button>
	</div>
	<div id='works'>
		<h1>업무 종류</h1>
		<ul class='floor'>
			<li id='title'>
				<span class='idx'>번호</span>
				<span class='title'>이름</span>
			</li>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['works']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<li>
				<span class='idx'><?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
</span>
				<span class='title'><input type='text' id='name' value='<?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
'/></span>
			</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<li id='default' style='display:none;'>
				<span class='idx'></span>
				<span class='title'><input type='text' id='name'/></span>
			</li>
		</ul>
		<input type='hidden' id='table' value='gh_works'/>
		<button type='button' class='add'>추가</button>
		<button type='button' class='del'>제거</button>
		<button type='button' class='mod'>수정</button>
	</div>
</div><?php }
}

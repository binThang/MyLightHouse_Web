<?php
/* Smarty version 3.1.30, created on 2017-07-25 14:23:28
  from "/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/home/menu.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5976d5d0e1b6a9_32874921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37538f193a090f8edb1281eb3f22fe697f6a5598' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/home/menu.php',
      1 => 1500959971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5976d5d0e1b6a9_32874921 (Smarty_Internal_Template $_smarty_tpl) {
?>
-메뉴
<span id='result'></span>
<div class="menu_control">
	<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)) {?>
	<ul class='floor1'>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index_first']->value, 'row1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row1']->value) {
?>
		<li>
			<input type='hidden' class='idx' value='<?php echo $_smarty_tpl->tpl_vars['row1']->value->idx;?>
'/>
			<span class='title'>이름 : </span>
			<span class='name'><input type='text' class='namevalue' value='<?php echo $_smarty_tpl->tpl_vars['row1']->value->name;?>
'/></span>
			<span class='title'>순서 : </span>
			<span class='rank'><?php echo $_smarty_tpl->tpl_vars['row1']->value->list;?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['row1']->value->child > 0) {?>
			<ul class='floor2'>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['row1']->value->child > 0) {?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['index_second']->value[$_smarty_tpl->tpl_vars['row1']->value->id], 'row2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row2']->value) {
?>
				<li>
					<input type='hidden' class='idx' value='<?php echo $_smarty_tpl->tpl_vars['row2']->value->idx;?>
'/>
					<span class='title'>이름 : </span>
					<span class='name'><input type='text' class='namevalue' value='<?php echo $_smarty_tpl->tpl_vars['row2']->value->name;?>
'/></span>
					<span class='title'>순서 : </span>
					<span class='rank'><?php echo $_smarty_tpl->tpl_vars['row2']->value->list;?>
</span>
				</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['row1']->value->child > 0) {?>
			</ul>	
		<?php }?>
		</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ul>
	<?php }?>
	<button type='button' id='menu_submit'>수정</button>
</div><?php }
}

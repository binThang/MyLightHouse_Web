<?php
/* Smarty version 3.1.30, created on 2017-07-31 16:36:57
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/home/menu.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597ede190053d5_63557597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7ea6e030e728b33c3b760350e704f1ca9baa882' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/home/menu.php',
      1 => 1501038736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597ede190053d5_63557597 (Smarty_Internal_Template $_smarty_tpl) {
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

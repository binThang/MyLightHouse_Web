<?php
/* Smarty version 3.1.30, created on 2017-07-20 13:29:50
  from "/host/home1/goodchar/html/app/views/logic/admin/control/setting.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597031bee6e3f0_41342965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80c7c52df6b11febfa059b3cf06a77a4fbbd6a04' => 
    array (
      0 => '/host/home1/goodchar/html/app/views/logic/admin/control/setting.php',
      1 => 1500524989,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597031bee6e3f0_41342965 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type='hidden' id='project' value='<?php echo $_smarty_tpl->tpl_vars['project']->value;?>
'/>
<input type='hidden' id='class' value='<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
'/>
<input type='hidden' id='method' value='<?php echo $_smarty_tpl->tpl_vars['method']->value;?>
'/>
<table border='1'>
	<thead>
		<tr>
			<th>Admin 템플릿</th>
			<th>기본 템플릿</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<select id='admin_template'>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['template_list']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
					<option value='<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
' <?php if ($_smarty_tpl->tpl_vars['row']->value->idx == $_smarty_tpl->tpl_vars['template']->value->admin_idx) {?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
			</td>
			<td>
				<select id='base_template'>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['template_list']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
					<option value='<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
' <?php if ($_smarty_tpl->tpl_vars['row']->value->idx == $_smarty_tpl->tpl_vars['template']->value->base_idx) {?>selected='selected'<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</select>
			</td>
		</tr>
		<tr>
			<td><button type='button' id='update_admin_template'>수정</button></td>
			<td><button type='button' id='update_base_template'>수정</button></td>
		</tr>
	</tbody>
</table><?php }
}

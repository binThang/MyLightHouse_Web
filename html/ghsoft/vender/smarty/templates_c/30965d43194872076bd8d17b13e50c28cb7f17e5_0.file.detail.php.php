<?php
/* Smarty version 3.1.30, created on 2017-07-27 17:35:26
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/detail.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5979a5cec5c1f3_52478724',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30965d43194872076bd8d17b13e50c28cb7f17e5' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/detail.php',
      1 => 1501144525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5979a5cec5c1f3_52478724 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='works_detail'>
	<table class='table table-active'>
		<colgroup>
			<col width="20%">
			<col width="30%">
			<col width="30%">
			<col width="20%">
		</colgroup>
		<thead>
			<tr>
				<th>등록일</th>
				<th>이름</th>
				<th>업무</th>
				<th>카테고리</th>
			</tr>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->date;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->name;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->work_value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->category_value;?>
</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan='4'>이미지</th>
			</tr>
			<td colspan='4'>
				<div id='file_zone'>
				<?php if (isset($_smarty_tpl->tpl_vars['file']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['file']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
					<?php if ($_smarty_tpl->tpl_vars['row']->value->type == 'image') {?>
					<div class='file_item' style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['row']->value->src;?>
');">
						<a href='<?php echo $_smarty_tpl->tpl_vars['row']->value->src;?>
' download>
							<?php echo $_smarty_tpl->tpl_vars['row']->value->ext;?>
 
						</a>
					</div>		
					<?php } else { ?>
					<div class='file_item'>
						<a href='<?php echo $_smarty_tpl->tpl_vars['row']->value->src;?>
' download>
							<?php echo $_smarty_tpl->tpl_vars['row']->value->ext;?>

						</a>
					</div>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				<?php }?>
				</div>
			</td>
		</tbody>
	</table>
	<button type='button' id='back' class='btn btn-warning'>뒤로</button>
</div><?php }
}

<?php
/* Smarty version 3.1.30, created on 2017-07-27 17:15:24
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/modify.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5979a11cec25b5_36172923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a0ac986531cacb8ab921dd947d22e33145ab554' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/modify.php',
      1 => 1501143324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5979a11cec25b5_36172923 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='works_modify'>
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
				<td><input type='date' id='date' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->date;?>
' readonly/></td>
				<td><input type='text' id='name' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->name;?>
' /></td>
				<td>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['work']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
					<?php $_smarty_tpl->_assignInScope('value', strpos($_smarty_tpl->tpl_vars['info']->value->work,$_smarty_tpl->tpl_vars['row']->value->idx));
?>
					<input type='checkbox' name='work[]' value='<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
' <?php if ($_smarty_tpl->tpl_vars['value']->value !== false) {?> checked='true' <?php }?> /><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
<br/>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</td>
				<td>
					<select id='category'>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
						<option value='<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
' <?php if ($_smarty_tpl->tpl_vars['info']->value->category == $_smarty_tpl->tpl_vars['row']->value->idx) {?> selected='true' <?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

					</select>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan='4'>이미지</th>
			</tr>
			<td colspan='4'>
				<form id='upload_form' enctype="multipart/form-data">
					<input multiple="multiple" id='file' type="file" name="file[]" accept="image/*"/>
				</form>
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
						<span class='delete_file'>X</span>
						<a href='<?php echo $_smarty_tpl->tpl_vars['row']->value->src;?>
' download>
							<?php echo $_smarty_tpl->tpl_vars['row']->value->ext;?>

						</a>
					</div>		
					<?php } else { ?>
					<div class='file_item'>
						<span class='delete_file'>X</span>
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
					<div class='file_item hidden' id='default'>
						<span class='delete_file'>X</span>
						<a href='' download></a>
					</div>	
				</div>
			</td>
		</tbody>
	</table>
	<input type='hidden' id='idx' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->idx;?>
'/>
	<button type='button' id='save' class='btn btn-primary' value='3'>저장</button>
	<button type='button' id='back' class='btn btn-warning'>취소</button>
</div><?php }
}

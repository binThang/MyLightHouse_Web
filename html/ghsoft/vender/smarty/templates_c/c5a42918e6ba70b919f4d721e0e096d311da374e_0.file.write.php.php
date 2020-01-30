<?php
/* Smarty version 3.1.30, created on 2017-07-27 14:18:40
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/write.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597977b0c18646_79885995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5a42918e6ba70b919f4d721e0e096d311da374e' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/write.php',
      1 => 1501132720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597977b0c18646_79885995 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='works_write'>
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
				<td><input type='date' id='date' value='<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
' readonly/></td>
				<td><input type='text' id='name'/></td>
				<td>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['work']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
					<input type='checkbox' name='work[]' value='<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
'/><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
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
'><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
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
					<div class='file_item hidden' id='default'>
						<span class='delete_file'>X</span>
						<a href='' download></a>
					</div>	
				</div>
			</td>
		</tbody>
	</table>
	<button type='button' id='save' class='btn btn-primary' value='3'>저장</button>
	<button type='button' id='back' class='btn btn-warning'>취소</button>
</div><?php }
}

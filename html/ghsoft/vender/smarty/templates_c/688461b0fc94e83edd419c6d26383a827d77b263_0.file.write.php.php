<?php
/* Smarty version 3.1.30, created on 2017-07-27 10:58:30
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/contact/write.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597948c6349e97_40742819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '688461b0fc94e83edd419c6d26383a827d77b263' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/contact/write.php',
      1 => 1501120694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597948c6349e97_40742819 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='contact_write'>
	<table class='table table-active'>
		<colgroup>
			<col width="20%">
			<col width="20%">
			<col width="10%">
			<col width="10%">
			<col width="30%">
		</colgroup>
		<thead>
			<tr>
				<th>등록일</th>
				<th>문의 종류</th>
				<th>상태</th>
				<th colspan='2'>파일</th>
			</tr>
			<tr>
				<td><input type='date' id='date' value='<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
' readonly/></td>
				<td>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['type']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
					<input type='checkbox' name='type[]' value='<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
'/><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
<br/>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</td>
				<td>
					<select id='status'>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['status']->value, 'row');
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
				<td colspan='2'>
					<form id='upload_form' enctype="multipart/form-data">
						<input multiple="multiple" id='file' type="file" name="file[]" />
					</form>
					<div id='file_zone'>
						<div class='file_item hidden' id='default'>
							<span class='delete_file'>X</span>
							<a href='' download></a>
						</div>	
					</div>
				</td>
			</tr>
			<tr>
				<th>회사명</th>
				<th>이메일</th>
				<th>전화번호</th>
				<th>가격</th>
				<th>홈페이지</th>
			</tr>
			<tr>
				<td><input type='text' id='company'/></td>
				<td><input type='text' id='email'/></td>
				<td><input type='text' id='phone'/></td>
				<td><input type='text' id='price'/></td>
				<td><input type='text' id='homepage'/></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan='5'>문의 내용</th>
			</tr>
			<tr>
				<td colspan='5'>
					<textarea id='text'></textarea>
				</td>
			</tr>
		</tbody>
	</table>
	<button type='button' id='save' class='btn btn-primary' value='3'>저장</button>
	<button type='button' id='back' class='btn btn-warning'>취소</button>
	
</div><?php }
}

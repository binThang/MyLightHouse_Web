<?php
/* Smarty version 3.1.30, created on 2017-07-26 11:38:34
  from "/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/contact/modify.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597800aa86d1c5_51863648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19060ad342f9529d02361646dac582567263bd3b' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/contact/modify.php',
      1 => 1501036713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597800aa86d1c5_51863648 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='contact_detail'>
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
				<td><input type='date' id='date' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->date;?>
'/></td>
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
				<td colspan='2'></td>
			</tr>
			<tr>
				<th>회사명</th>
				<th>이메일</th>
				<th>전화번호</th>
				<th>가격</th>
				<th>홈페이지</th>
			</tr>
			<tr>
				<td><input type='text' id='company' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->company;?>
'/></td>
				<td><input type='text' id='email' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->email;?>
'/></td>
				<td><input type='text' id='phone' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->phone;?>
'/></td>
				<td><input type='text' id='price' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->price;?>
'/></td>
				<td><input type='text' id='homepage' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->homepage;?>
'/></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan='5'>문의 내용</th>
			</tr>
			<tr>
				<td colspan='5'>
					<textarea id='text'>
						<?php echo $_smarty_tpl->tpl_vars['info']->value->text;?>

					</textarea>
				</td>
			</tr>
		</tbody>
	</table>
	<input type='hidden' id='idx' value='<?php echo $_smarty_tpl->tpl_vars['info']->value->idx;?>
'/>
	<button type='button' id='complete' class='btn btn-primary' value='2'>상담완료</button>
	<button type='button' id='go_devel' class='btn btn-primary' value='3'>제작진행</button>
	<button type='button' id='back' class='btn btn-warning'>뒤로</button>
	
</div><?php }
}

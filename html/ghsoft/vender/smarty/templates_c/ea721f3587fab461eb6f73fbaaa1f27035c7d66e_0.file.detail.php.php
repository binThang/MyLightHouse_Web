<?php
/* Smarty version 3.1.30, created on 2017-07-26 11:14:40
  from "/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/contact/detail.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5977fb10eedf77_64050422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea721f3587fab461eb6f73fbaaa1f27035c7d66e' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/contact/detail.php',
      1 => 1501035279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5977fb10eedf77_64050422 (Smarty_Internal_Template $_smarty_tpl) {
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
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->date;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->type_value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->status_value;?>
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
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->company;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->email;?>
</td>
				<td><?php echo setPhonePreg($_smarty_tpl->tpl_vars['info']->value->phone);?>
</td>
				<td><?php echo number_format($_smarty_tpl->tpl_vars['info']->value->price);?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['info']->value->homepage;?>
</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan='5'>문의 내용</th>
			</tr>
			<tr>
				<td colspan='5'><?php echo $_smarty_tpl->tpl_vars['info']->value->text;?>
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

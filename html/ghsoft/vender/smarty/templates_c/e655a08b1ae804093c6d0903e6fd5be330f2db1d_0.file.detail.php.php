<?php
/* Smarty version 3.1.30, created on 2017-07-27 11:15:19
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/contact/detail.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59794cb76fd217_13114693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e655a08b1ae804093c6d0903e6fd5be330f2db1d' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/contact/detail.php',
      1 => 1501121563,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59794cb76fd217_13114693 (Smarty_Internal_Template $_smarty_tpl) {
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
				<td colspan='2'>
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

				<?php } else { ?>
					없음
			<?php }?>
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
				<td colspan='5'><?php echo nl2br($_smarty_tpl->tpl_vars['info']->value->text);?>
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

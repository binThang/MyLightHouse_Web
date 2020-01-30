<?php
/* Smarty version 3.1.30, created on 2017-07-27 15:56:20
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/setting.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59798e94e17849_17448717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '650f121bee75c4ce0eeccbab8b6351a9d4a4a6c3' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/admin/works/setting.php',
      1 => 1501138578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59798e94e17849_17448717 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='works_list'>
	<table class='table table-hover'>
		<colgroup>
			<col width="5%">
			<col width="20%">
			<col width="35%">
			<col width="15%">
			<col width="15%">
			<col width="10%">
		</colgroup>
		<thead>
			<tr>
				<th>번호</th>
				<th>개발</th>
				<th>이름</th>
				<th>업무</th>
				<th>등록일</th>
				<th>기타</th>
			</tr>	
		</thead>
		<tbody>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value->category;?>
</td>
				<td><a href='/admin/works/detail/<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
'><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value->work;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value->date;?>
</td>
				<td>
					<a href='/admin/works/modify/<?php echo $_smarty_tpl->tpl_vars['row']->value->idx;?>
'>수정</a> | <a class='delete'>삭제</a>
				</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tbody>
	</table>
	<div class="pagediv">
		<input type='hidden' id='now_page' value='<?php echo $_smarty_tpl->tpl_vars['view']->value;?>
'/>
		<input type='hidden' id='last_page' value='<?php echo $_smarty_tpl->tpl_vars['last']->value;?>
'/>
		<input type='hidden' id='move_page' value='/admin/works/setting/'/>
		<ul>
			<li><a href='/admin/works/setting/1'>처음</a></li>
			<li><a id='page_prev'><</a></li>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<li><a href='/admin/works/setting/<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['row']->value == $_smarty_tpl->tpl_vars['view']->value) {?>style="font-weight:bold;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</a></li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<li><a id='page_next'>></a></li>
			<li><a href='/admin/works/setting/<?php echo $_smarty_tpl->tpl_vars['last']->value;?>
'>끝</a></li>
		</ul>
	</div>
	<a href='/admin/works/write' class='btn btn-primary'>신규작성</a>
</div><?php }
}

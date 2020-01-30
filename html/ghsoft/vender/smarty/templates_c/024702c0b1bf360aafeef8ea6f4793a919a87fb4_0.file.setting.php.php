<?php
/* Smarty version 3.1.30, created on 2017-07-25 16:35:57
  from "/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/faq/setting.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5976f4ddb5b069_47676133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '024702c0b1bf360aafeef8ea6f4793a919a87fb4' => 
    array (
      0 => '/home/hosting_users/globalhu/www/ghsoft/views/logic/admin/faq/setting.php',
      1 => 1500968151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5976f4ddb5b069_47676133 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class='faq_list'>
	<table id='faq_table' class='table table-hover'>
		<colgroup>
			<col width="5%">
			<col width="35%">
			<col width="35%">
			<col width="25%">
		</colgroup>
		<thead>
			<tr>
				<th>번호</th>
				<th>질문</th>
				<th>답변</th>
				<th>작업</th>
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
				<td class='content'><?php echo $_smarty_tpl->tpl_vars['row']->value->title;?>
</td>
				<td class='content'><?php echo $_smarty_tpl->tpl_vars['row']->value->text;?>
</td>
				<td id='working'>
					<button type='button' class='modify btn btn-primary'>수정</button>
					<button type='button' class='delete btn btn-danger'>삭제</button>
				</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</tbody>
	</table>
	<div class='hidden'>
		<textarea id='default_text'></textarea>
		<div id='mod_style'>
			<button type='button' id='go_modify' class='btn btn-warning'>수정</button>
			<button type='button' id='cancel' class='cancel btn btn-danger'>취소</button>
		</div>
		<div id='action_style'>
			<button type='button' id='modify' class='modify btn btn-primary'>수정</button>
			<button type='button' id='delete' class='delete btn btn-danger'>삭제</button>
		</div>
	</div>
	<div class="pagediv">
	<input type='hidden' id='now_page' value='<?php echo $_smarty_tpl->tpl_vars['view']->value;?>
'/>
	<input type='hidden' id='last_page' value='<?php echo $_smarty_tpl->tpl_vars['last']->value;?>
'/>
	<input type='hidden' id='move_page' value='/admin/faq/setting/'/>
	<ul>
		<li><a href='/admin/faq/setting/1'>처음</a></li>
		<li><a id='page_prev'><</a></li>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
		<li><a href='/admin/faq/setting/<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['row']->value == $_smarty_tpl->tpl_vars['view']->value) {?>style="font-weight:bold;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</a></li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		<li><a id='page_next'>></a></li>
		<li><a href='/admin/faq/setting/<?php echo $_smarty_tpl->tpl_vars['last']->value;?>
'>끝</a></li>
	</ul>
</div>
</div><?php }
}

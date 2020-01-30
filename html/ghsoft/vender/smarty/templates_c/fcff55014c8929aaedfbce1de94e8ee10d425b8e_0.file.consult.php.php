<?php
/* Smarty version 3.1.30, created on 2017-08-01 17:09:32
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/notice/consult.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5980373c28aec8_71951391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcff55014c8929aaedfbce1de94e8ee10d425b8e' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/notice/consult.php',
      1 => 1501574971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5980373c28aec8_71951391 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="notice">
  <article class="consult_wrap">
    <h2 class="behind">consult</h2>
    <div class="container">
      <table class="tb_wrap">
        <caption class="behind"> contsult table</caption>
        <colgroup>
          <col style="width:20%;">
          <col style="width:*">
          <col style="width:15%;">
          <col style="width:15%;">
        </colgroup>
        <thead>
          <tr>
            <th scope="col">company</th>
            <th scope="col">category</th>
            <th scope="col">work status</th>
            <th scope="col">date</th>
          </tr>
        </thead>
        <tbody>
  		  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'arr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arr']->value) {
?>
          <tr>
            <td scope="rwo"><?php echo $_smarty_tpl->tpl_vars['arr']->value->company;?>
</td>
            <td scope="rwo"><?php echo $_smarty_tpl->tpl_vars['arr']->value->type;?>
</td>
      			<?php if ($_smarty_tpl->tpl_vars['arr']->value->status_value == '상담대기') {?>
            <td scope="rwo">
      			<?php } elseif ($_smarty_tpl->tpl_vars['arr']->value->status_value == '상담완료') {?>
      			<td scope="rwo">
      			<?php } elseif ($_smarty_tpl->tpl_vars['arr']->value->status_value == '완료') {?>
      			<td scope="complete">
      			<?php }?>
              <p><?php echo $_smarty_tpl->tpl_vars['arr']->value->status_value;?>
</p>
            </td>
            <td scope="rwo"><?php echo $_smarty_tpl->tpl_vars['arr']->value->date;?>
</td>
          </tr>
  		  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
      </table>
      <div class="paging">
		<?php $_smarty_tpl->_assignInScope('listTag', "/index/notice/consult/");
?>
		<input type='hidden' id='now_page' value='<?php echo $_smarty_tpl->tpl_vars['view']->value;?>
'/>
		<input type='hidden' id='last_page' value='<?php echo $_smarty_tpl->tpl_vars['last']->value;?>
'/>
		<input type='hidden' id='move_page' value='<?php echo $_smarty_tpl->tpl_vars['listTag']->value;?>
'/>
			<a href='<?php echo $_smarty_tpl->tpl_vars['listTag']->value;?>
1'><img src="/public/logic/index/img/btn_prev.png" alt="처음으로 이동하기"></a>
			<a id='page_prev'><img src="/public/logic/index/img/btn_prev2.jpg" alt="이전으로 이동하기"></a>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
			<a href='<?php echo $_smarty_tpl->tpl_vars['listTag']->value;
echo $_smarty_tpl->tpl_vars['row']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['row']->value == $_smarty_tpl->tpl_vars['view']->value) {?>style="font-weight:bold;" class="on"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</a>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			<a id='page_next'><img src="/public/logic/index/img/btn_next2.jpg" alt="다음으로 이동하기"></a>
			<a href='<?php echo $_smarty_tpl->tpl_vars['listTag']->value;
echo $_smarty_tpl->tpl_vars['last']->value;?>
'><img src="/public/logic/index/img/btn_next.png" alt="끝으로 이동하기"></a>
      </div>
    </div><!--//container -->
  </article><!--//consult_wrap-->
</section>

<!-- description
[menu]
NOTICE -> CONSULT

[title]
CONSULT PAGE

[link]
/index/notice/consult

[controller]
ghsoft/controller/logic/index/notice.php

[model]
ghsoft/models/logic/index/noticemodel.php

[public]
/public/logic/index/

[css]
/public/logic/index/css/notice.css

[js]
/public/logic/index/js/notice.js

//description -->
<?php }
}

<?php
/* Smarty version 3.1.30, created on 2017-07-31 16:51:53
  from "/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/contact/contact.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597ee19914dd30_36923090',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db4e664b9321f622c53599e1ccc1686fba98cd4e' => 
    array (
      0 => '/home/hosting_users/ghsoft01/www/ghsoft/views/logic/index/contact/contact.php',
      1 => 1501487509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597ee19914dd30_36923090 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="contact_wrap">
  <article class="">
    <h2 class="behind">contact</h2>
    <div class="container">
      <strong>info</br>mation</strong>
      <div class="content">
        <figure>
          <img src="/public/logic/index/img/contact01.jpg" alt="">
        </figure>
        <div class="infobox">
          <form>
            <!--[D]: lable for 과 input name id 맞춰주세요 -->
            <fieldset>
              <legend>예약 정보 작성란 </legend>
              <table>
                <tr>
                  <th class="top">문의분야</th>
                  <td>
                    <div class="custom_checkbox">
                      <!--[D]: checkbox name, id , label for 이름 바꾸셔도 됩니다.(test용도) -->
                      <input type="checkbox" name="a1" id="a1" value="">
                      <label for="a1">웹 사이트 구축 문의 </label>
                    </div>
                    <div class="custom_checkbox">
                      <input type="checkbox" name="a2" id="a2" value="">
                      <label for="a2">하이브리드 앱</label>
                    </div>
                    <div class="custom_checkbox">
                      <input type="checkbox" name="" id="" value="">
                      <label for="">모바일 앱 구축 문의 </label>
                    </div>
                    <div class="custom_checkbox">
                      <input type="checkbox" name="" id="" value="">
                      <label for="">앱</label>
                    </div>
                    <p class="txt">중복체크 가능</p>
                  </td>
                </tr>
                <tr>
                  <th><label for=""><span class="required">회사명 / 이름</span></label></th>
                  <td>
                    <input type="text" id="" name="" value="" autofocus required>
                  </td>
                </tr>
                <tr>
                  <th><label for=""><span class="required">E-mail</span></label></th>
                  <td>
                    <input type="email" id="" name="" value="" required>
                  </td>
                </tr>
                <tr>
                  <th><label for=""><span class="required">연락처</span></label></th>
                  <td>
                    <input type="tel" name="" id="" value="" required placeholder="- 없이 입력하세요.">
                  </td>
                </tr>
                <tr>
                  <th><label for="">예상금액</label></th>
                  <td>
                    <select class="" name="">
                      <option value="">예산범위</option>
                      <option value="">100만원 ~ 500만원</option>
                      <option value="">500만원 ~ 1,000만원</option>
                      <option value="">1,000만원 ~ 2,000만원</option>
                      <option value="">2,000만원 ~ 3,000만원</option>
                      <option value="">3,000만원 ~ 4,000만원</option>
                      <option value="">4,000만원 ~ 5,000만원</option>
                      <option value="">4,000만원 ~ 5,000만원</option>
                      <option value="">별도협의</option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <th><label for="">http://</label></th>
                  <td>
                    <input type="url" name="" id="" value="" >
                  </td>
                </tr>
                <tr>
                  <th><label for="">첨부파일</label></th>
                  <td>
                    <input type="text" name="" value="">
                    <button type="button"><img src="/public/logic/index/img/icn_cam.png" alt=""></button>
                    <!-- 추가 목록 들어오는 자리 -->
                    <!--
                    <input type="text" name="" value="">
                    <input type="text" name="" value="">
                    <input type="text" name="" value="">
                    <input type="text" name="" value="">
                    -->
                  </td>
                </tr>
                <tr>
                  <th>문의 내용</th>
                  <td>
                    <textarea></textarea>
                  </td>
                </tr>
              </table>
              <input type="submit" name="" value="send">
            </fieldset>
          </form>
        </div><!--//infobox-->
      </div><!--//content-->
    </div><!--//container-->
  </article>
</section><!--//contact_wrap-->


<!-- description

[menu]
CONTACT -> INFORMATION

[title]
INFORMATION PAGE 예약

[link]
/
/index
/index/contact
/index/contact/index
/index/contact/information

[controller]
ghsoft/controller/logic/index/contact.php

[model]
ghsoft/models/logic/index/contactmodel.php

[public]
/public/logic/index/

[css]
/public/logic/index/css/contact.css

[js]
/public/logic/index/js/contact.js

</pre>
 -->
 <!-- <p>
   <label for=""><span class="required">회사명 / 이름</span></label>
   <input type="text" name="" value="" autofocus required>
 </p>
 <p>
   <label for=""><span class="required">E-mail</span></label>
   <input type="email" name="" value="" required>
 </p>
 <p>
   <label for=""><span class="required">연락처</span></label>
   <input type="tel" name="" value="" required placeholder="-없이 입력하세요.">
 </p>
 <p>
   <label for="">예상 금액</label>
   <input type="text" name="" value="">
 </p>
 <p>
   <label for="">http://</label>
   <input type="url" name="" value="">
 </p>
 <p>
   <label for="">첨부파일1</label>
   <input type="file" name="" value="">
 </p>
 <p>
   <label for="">첨부파일2</label>
   <input type="file" name="" value="">
 </p>
 <p>
   <label for="">내용</label>
   <textarea></textarea>
 </p> -->
<?php }
}

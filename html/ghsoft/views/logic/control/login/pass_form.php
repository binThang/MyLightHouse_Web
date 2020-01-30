<section>
    <h2 class="blind">관리자페이지 비밀번호 변경</h2>
    <article id="password" class="admin-wrap">
        <h2 class="blind">관리자페이지 비밀번호 변경</h2>
        <div class="admin-con1">
            <img src="/public/template/control/img/admin3.png" alt="로그인">
            <p>비밀번호를 변경해주세요.</p>
            <span>ADMINISTRATOR PASSWORD</span>
        </div>
        <div class="admin-con2">
            <form action="/admin/pass/update">
                <fieldset>
                    <legend>비밀번호 폼 형식</legend>
                    <div class="admin-form admin-form1">
                        <div><input type="password" name="pass_old" required="required" class="req" minlength="8" placeholder="기존 비밀번호" title="기존 비밀번호를 입력하세요."></div>
                    </div>
                    <div class="admin-form admin-form2">
                        <div><input type="password" id="password" name="pass_new" required="required" class="req" minlength="8" placeholder="변경할 비밀번호" title="변경할 비밀번호를 입력하세요."></div>
                        <div><img src="/public/template/control/img/icon_o.png" alt="일치함" class="hidden checko"><img src="/public/template/control/img/icon_x.png" alt="일치하지 않음" class="hidden checkx"></div>
                    </div>
                    <div class="admin-form admin-form2">
                        <div><input type="password" id="password_verify" required="required" class="req" minlength="8" placeholder="비밀번호 확인" title="비밀번호 다시 입력를 입력하세요."></div>
                        <div><img src="/public/template/control/img/icon_o.png" alt="일치함" class="hidden checko"><img src="/public/template/control/img/icon_x.png" alt="일치하지 않음" class="hidden checkx"></div>
                    </div>
        	        <div><button type="button" id="pass_btn" class="btn">완료</button><button type="submit" class="hidden"></button></div>
                </fieldset>
        	</form>
        </div>
    </article>
</section>

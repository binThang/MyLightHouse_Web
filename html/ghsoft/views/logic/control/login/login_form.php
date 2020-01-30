<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=1.0">
        <title>관리자로그인</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="//cdn.globalhu.kr/css/base_admin.css">
        <link rel="stylesheet" href="/public/template/control/css/login.css">
    </head>
    <body>
        <section>
            <h2 class="blind">관리자페이지 로그인</h2>
            <article id="login" class="admin-wrap">
                <h2 class="blind">관리자페이지 로그인</h2>
                <div class="admin-con1">
                    <img src="/public/template/control/img/admin1.png" alt="로그인">
                    <p>관리자 로그인</p>
                    <span>ADMINISTRATOR LOGIN</span>
                </div>
                <div class="admin-con2">
                    <form action="/admin/login" method="post">
                        <fieldset>
                            <legend>로그인 폼 형식</legend>
                            <div class="admin-form">
                                <div><img src="/public/template/control/img/id.png" alt="아이디"></div>
                                <div><input type="text" name="id" required="required" placeholder="아이디" title="아이디를 입력하세요."></div>
                            </div>
                            <div class="admin-form">
                                <div><img src="/public/template/control/img/password.png" alt="비밀번호"></div>
                                <div><input type="password" name="pass" required="required" placeholder="비밀번호" title="비밀번호를 입력하세요."></div>
                            </div>
                            <div class="btn-login"><button type="submit">LOGIN</button></div>
                        </fieldset>
                    </form>
                </div>
            </article>
        </section>
    </body>
</html>

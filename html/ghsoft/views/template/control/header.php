<header>
    <!--S:admin header pc-->
    <div class="header">
        <h1 class="logo"><a href="/admin" class="href"><img src="/public/template/control/img/logo.png" alt="업체 로고"></a></h1>
        <nav>
            <ul class="header-menu">
              <li><img src="/public/template/control/img/admin2.png" alt="관리자 아이콘"><p class="color-blue"><span><?=$_SESSION['admin_name'];?></span>님 환영합니다.</p></li>
              <li><a href="/admin/pass" class="ajax" title="비밀번호 변경페이지로 이동"><img src="/public/template/control/img/change_password.png" alt="비밀번호"></a></li>
              <li><a href="/admin/logout" class="href" title="로그아웃"><img src="/public/template/control/img/logout.png" alt="로그아웃"></a></li>
            </ul>
        </nav>
    </div>
    <!--E:admin header pc-->
    <!--S:adming header mobile-->
    <table class="m-header">
        <caption class="blind">모바일 관리자페이지 헤더</caption>
        <tbody>
            <tr>
                <td class="left middle">
                    <div class="m-menu">
                      <button type="button" class="menu-bar"><img src="/public/template/control/img/menu_bar.png" alt="메뉴 바"></button>
                      <button type="button" class="btn-close"><img src="/public/template/control/img/close.png" alt="닫기"></button>
                    </div>
                </td>
                <td class="center middle">
                    <h1 class="m-logo"><a href="/admin" class="href"><img src="/public/template/control/img/logo.png" alt="업체 로고"></a></h1>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <!--E:adming header mobile-->
</header>

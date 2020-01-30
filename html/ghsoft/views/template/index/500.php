<?php if($_POST['type']!='ajax'){?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <?php
        // <meta name="naver-site-verification" content="7c49348aa1c4eb7ec2d6dd4ce29d4600a7174000"/>
        // <meta name="description" content="앱개발전문 에이전시, 하이브리드앱, iOS/안드로이드 앱개발, 제작기획 지원">
        ?>
        <title><?=TITLE;?></title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link href="/public/template/index/css/common.css<?=TESTING?>" rel="stylesheet" type="text/css">
        <link href="/public/template/index/css/exception.css<?=TESTING?>" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--S:error-->
<?php } ?><section class="error">
            <h2 class="blind">500 error page</h2>
            <article>
                <!--S:left-->
                <div class="left-box">
                    <div>
                        <p class="icon"><img src="/public/template/index/img/error.png" alt="에러이미지"></p>
                        <p class="txt">500</p>
                        <p class="txt">server error</p>
                        <div class="m-txt">
                            <p>죄송합니다.</p>
                            <p>서버 에러가<br>발생 하였습니다.</p>
                        </div>
                    </div>
                </div>
                <!--E:left-->
                <!--S:right-->
                <div class="right-box">
                    <div>
                        <p class="txt">죄송합니다.</p>
                        <p>서버 에러가 발생 하였습니다.</p>
                        <p>잠시 후 다시 시도해주세요.</p>
                    </div>
                </div>
                <!--E:right-->
            </article>
        </section>
<?php if($_POST['type']!='ajax'){?>
        <!--E:error-->
    </body>
</html>
<?php } ?>

<section>
    <?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);?>

    <article class="view-area relative">
        <h2 class="blind">상세보기</h2>
        <!--S:이미지,글-->
        <?
        if($array[1] == 'fun'){
            $textclass = 'hidden';
        }
        $img = explode(',',$this->list->images); $i = 0;
        while($img[$i]){
            if(!$img[0]){
                $class = 'hidden';
            }?>
            <div class="content relative">
                <div class="img" style="background-image:url('/public/uploads/mobile/image/<?=$img[$i]?>');"></div>
                <div class="txt-box <?=$class?>">
                    <div class="txt <?=$textclass?>">
                        내 등에 기대
                        내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대내 등에 기대
                    </div>
                    <div class="hashtag center <?=$textclass?>">
                        <a class="on">#대인관계</a> <!--[D] 선택이 되었을때 on class 걸어주세요.-->
                        <a>#따돌림</a>
                        <a>#왕따</a>
                        <a>#은따</a>
                        <a>#따돌림</a>
                        <a>#따돌림</a>
                        <a>#왕따</a>
                        <a>#은따</a>
                        <a>#따돌림</a>
                    </div>
                </div>
            </div>
            <!--E:이미지,글-->
        <?$i++;}?>
        <!--S:좋아요,댓글-->
        <ul class="btm-box list-box">
            <li class="left">
                <button type="button"><img src="/public/template/app/img/like_off.png" alt="좋아요"><span>5</span></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span>2</span></button>
            </li>
            <li class="right">
                <button type="button" class=""><img src="/public/template/app/img/warning.png" alt="신고하기"><span>1</span></button>
                <button type="button" class="etc hidden"><img src="/public/template/app/img/etc.png" alt="기타"><span>1</span></button>
                <!--[D] 뻔해도 좋은 일때만 etc가 보여지고 신고하기가 안보여집니다.-->
            </li>
        </ul>
        <!--E:좋아요,댓글-->
        <!--S:댓글 내용-->
        <ul class="reply-con">
            <li>
                <div class="left">
                    <span class="name">등대지기</span><span class="date">1시간 전</span>
                    <p>마음에 담아두지 마세요.마음에 담아두지 마세요.
                        마음에 담아두지 마세요.마음에 담아두지 마세요.</p>
                </div>
                <div class="right">
                    <button type="button" class="btn-like"><img src="/public/template/app/img/like2_off.png" alt="좋아요"></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                    <button type="button"><img src="/public/template/app/img/warning.png" alt="신고하기"></button>
                </div>
            </li>
            <!--S:대댓글-->
            <li class="reply">
                <div class="ico-reply center">
                    <img src="/public/template/app/img/reply2.png" alt="대댓글 화살표">
                </div>
                <div>
                    <div class="left">
                        <span class="name">등대지기</span><span class="date">1시간 전</span>
                        <p>마음에 담아두지 마세요.마음에 담아두지 마세요.
                            마음에 담아두지 마세요.마음에 담아두지 마세요.</p>
                    </div>
                    <div class="right">
                        <button type="button"><img src="/public/template/app/img/like2_off.png" alt="좋아요"></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                        <button type="button"><img src="/public/template/app/img/warning.png" alt="신고하기"></button>
                    </div>
                </div>
            </li>
            <!--E:대댓글-->
        </ul>
        <!--E:댓글 내용-->
        <!--S:댓글 작성-->
        <div class="reply_con">
            <form>
                <fieldset>
                    <legend>댓글 작성</legend>
                    <div class="" contenteditable="true"></div>
                    <button type="button" class="">등록</button> <!--[D]텍스트 입력시 on class!!-->
                </fieldset>
            </form>
        </div>
        <!--E:댓글 작성-->
    </article>
</section>
<!--<script type="text/javascript">
    $('.txt').height(($('.txt-box').height()-$('.hashtag').height())-65).css({'padding':'80px 40px','overflow-y':'scroll'});
    $('.reply-con').css({'margin-bottom':$('.reply-write').height()+10});
</script>-->

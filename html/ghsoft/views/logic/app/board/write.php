
<?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);
?>
<section>
    <article class="write-area relative">
        <h2 class="blind">업로드</h2>
        <form>
            <fieldset>
                <legend>업로드 폼</legend>
                <!--S:이미지,텍스트,해시태그-->
                <div class="content relative">
                    <div class="txt-box" id = 'backimg' data-idx = '<?=$this->backimg->gallery_idx?>' style="background-image:url('/public/uploads/mobile/image/<?=$this->backimg->image?>');" >
                        <?if($this->backimg->color){ $color = 'textwhite';}else{ $color = 'textblack';}?>
                        <div class="txt">
                            <textarea id = 'text' class = '<?=$color?>'></textarea>
                        </div>

                        <div class="hashtag center <?=$color?>">
                        </div>
                    </div>
                </div>
                <!--E:이미지,텍스트,해시태그-->
                <!--S:사진업로드,공개,색변경-->
                <div class="btn-plus floating">
                    <button type="button" class="btn"><img src="/public/template/app/img/floating.png" alt="플로팅 버튼"></button>
                </div>
                <div class="btn-box floating hidden">
                    <?if($array[2] == 'write'){
                        $class = 'hidden';
                        $str = 'back';
                    }else{
                        $str = 'tony';
                    }?>
                    <button type="button" id = 'ifshow' class="btn-secret btn <?=$class?>" value = '1'><img src="/public/template/app/img/secret_off.png" alt="공개"></button> <!--[D] 토니가 들어줄께만 공개,비공개가 보여집니다. 클릭시 이미지 변경 <img src="/public/template/app/img/secret_on.png" alt="비공개">-->
                    <button type="button" class="btn-photo btn sajin"><img src="/public/template/app/img/photo.png" alt="사진"></button>
                    <!-- <button type="button" data-on = '' class="btn-white btn hidden colorwhite"><img src="/public/template/app/img/white.png" alt="흰색"></button>
                    <button type="button" data-on = 'on' class="btn-black btn colorblack"><img src="/public/template/app/img/black.png" alt="검정색"></button>  <!--[D] 흰색 버튼 클릭시 검정으로 변경!!-->
                </div>
                <!--E:사진업로드,공개,색변경-->

                <!--S:사진 이미지 고르기-->
                <div class="photo-con hidden">
                    <ul id = 'gallery'>
                    </ul>
                </div>
                <!--E:사진 이미지 고르기-->
            </fieldset>
        </form>
    </article>
</section>

<script type="text/javascript">
    $(function(){
        var str = '<?=$str?>';
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.writea(str);
        }else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
           window.webkit.messageHandlers.writea.postMessage(str);
        }
        //텍스트 높이
        select_hashtag(1);
        $(window).resize(function(){
            $('.txt').height(($('.txt-box').height()-$('.hashtag').height())-100);
        });
        $('.txt').height(($('.txt-box').height()-$('.hashtag').height()-100));
    });

</script>
<!-- <script type="text/javascript">
    $('body').on('click', '.btn-photo', function(){
        if ($('.btm-box').css("bottom")!='0px') {
            $('.btm-box').animate({"bottom":"0"});
        } else {
            $('.btm-box').animate({"bottom":"-250px"});
        }
    });
    $('body').on('click', '.content.relative', function(){
        $('.btm-box').animate({"bottom":"-250px"});
    });
</script> -->
<section>
    <?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);
    $imgshow = '/public/template/app/img/like_off.png';
    if($this->view->con){$imgshow = '/public/template/app/img/like_on.png';}?>

    <article id = 'arti' class="view-area relative">
        <h2 class="blind">상세보기</h2>
        <!--S:이미지,글-->
        <?
            // $video = substr($this->list->video,32);
            $video = $this->list->content_url;
             $url = 'http://www.youtube.com/embed/'.$video;?>
            <div class=" relative">
                <iframe id="player" type="text/html" width="100%" src="<?=$url?>" allowfullscreen="allowfullscreen"​  frameborder="0"></iframe>
            </div>

            <!--S:좋아요,댓글-->
               <ul class="btm-box list-box">
                   <li class="left">
                         <button type="button" id = 'like' data-board = '<?=$array[3]?>'><img src="<?=$imgshow?>" alt="좋아요"><span><?=$this->view->allcount?></span></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                       <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$this->view->replycon?></span></button>
                   </li>
                   <li class="right">
                         <!-- <button type="button" class="etc" id = 'share'><img src="/public/template/app/img/etc.png" alt="기타"></button> -->
                       <!--[D] 뻔해도 좋은 일때만 etc가 보여지고 신고하기가 안보여집니다.-->
                   </li>
               </ul>
               <!--E:좋아요,댓글-->
    <!--댓글 위에  <div class="ico-reply center">
        <img src="/public/template/app/img/reply2.png" alt="대댓글 화살표">
    </div> -->
        <!--S:댓글 내용-->
        <ul class="reply-con">
            <?php
            foreach($this->replylist as $row){
                $alltime = diffDate($row->rdate,"hour");
                $timelen = strlen($alltime);
                if($timelen == 19){
                    $timearray = explode(' ',$row->rdate);
                    $time = $timearray[0];
                }else{
                    $time = $alltime;
                }
                $img = '/public/template/app/img/like2_off.png';
                if($row->con){
                    $img = '/public/template/app/img/like_on.png';
                }
                $class = 'left';
                $myclass = 'my';
                if($row->reply_idx != $row->parent_idx){
                    $myclass = 'myreply';
                    $class = 'reply';
                }?>
            <li class = '<?=$class?> lireply<?=$row->reply_idx?>'>
                    <?if($row->reply_idx != $row->parent_idx){?>
                        <div class="ico-reply center">
                            <img src="/public/template/app/img/reply2.png" alt="대댓글 화살표">
                        </div>
                        <div>
                    <?}?>

                    <div class="left reply_re <?=$class?>" data-idx = '<?=$row->reply_idx?>'>
                        <span class="name"><?=$row->member_name?></span><span class="date"><?=$time?></span>

                        <?if($row->myreply){?>
                            <button type="button" class = '<?=$myclass?>' data-board = '<?=$row->reply_idx?>'>
                                    <img src="/public/template/app/img/my_ico.png" alt="내 댓글 수정삭제">
                            </button>
                        <?}else{?>
                            <button type="button" class = 'singo replysingo' data-board = '<?=$row->reply_idx?>'>
                                <img src="/public/template/app/img/warning.png" alt="신고하기">
                            </button>
                        <?}?>
                        <button type="button" class="btn-like replylike" data-board = '<?=$row->reply_idx?>'>
                            <img src="<?=$img?>" alt="좋아요">
                        </button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                        <?$recontent = str_replace(PHP_EOL, ("<br />".PHP_EOL), $row->content);?>

                    </div>
                    <div>
                        <p><?=$recontent?></p> <!--댓글 텍스트-->
                    </div>
                    <?if($row->reply_idx == $row->parent_idx){?>
                    </div>
                    <?}?>

                </li>
            <?}?>

        </ul>
        <!--E:댓글 내용-->
        <!--S:댓글 작성-->
        <div class="reply-write">
            <form>
                <fieldset>
                    <legend>댓글 작성</legend>
                    <textarea type="text" class="" contenteditable="true" id = 'reply' autocomplete="off"></textarea>
                    <button type="button" class="" id = 'replybutton' data-idx = '<?=$array[3]?>' data-parent-idx = ''>등록</button> <!--[D]텍스트 입력시 on class!!-->
                </fieldset>
            </form>
        </div>
        <!--E:댓글 작성-->
    </article>
</section>
<!--script type="text/javascript">
    $('.txt').height(($('.txt-box').height()-$('.hashtag').height())-65).css({'padding-bottom':'20px','overflow-y':'scroll'});
    $('.reply-con').css({'margin-bottom':$('.reply-write').height()+10});
    var ifpush = "<?=$this->push?>";
    if(ifpush != ''){
        function viewnext(){
            return false;
        }
    }
</script--!>

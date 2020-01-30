<section>
    <?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);?>

    <article class="view-area relative">
        <h2 class="blind">상세보기</h2>
        <!--S:이미지,글-->
            <div class="content relative">
                <div class="txt-box" style="background-color:<?=$this->list->color?>;">
                    <?if($this->list->color == 0) $color = 'textwhite'; else $color = 'textblack';
            			// $content = str_replace(PHP_EOL, ("<br />".PHP_EOL), $this->view->content);?>
                    <h1 class="<?=$color?>" style="margin-top:10px;"><?=$this->list->subject?></h1>
		    <div class="txt ">
                        <textarea class="<?=$color?>" readonly onfocus="this.blur();"><?=$this->list->content?></textarea>
                    </div>
                    <div class="hashtag center <?=$color?>">
                        <?$tagarray = explode(',',$this->list->category);
                        $i = 0; while($tagarray[$i]){?>
                            <a class = 'on'><?=$tagarray[$i];?></a> <!--[D] 선택이 되었을때 on class 걸어주세요.-->
                        <?$i++;}?>
                    </div>
                </div>
            </div>
            <!--E:이미지,글-->
        <!--S:좋아요,댓글-->
        <ul class="btm-box list-box">
            <li class="left">
                <?($this->favoritereplycon->con)?$img='/public/template/app/img/like_on.png':$img='/public/template/app/img/like_off.png';?>
                <button type="button" class = 'boardlike' data-board = '<?=$this->list->metoo_idx?>'><img src="<?=$img?>" alt="좋아요"><span><?=$this->favoritereplycon->allcount?></span></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$this->favoritereplycon->replycon?></span></button>
            </li>
            <li class="right">
                <button type="button" class="">
                    <img class = 'singo board' data-board = '<?=$this->view->board_idx?>' src="/public/template/app/img/warning.png" alt="신고하기"><span><?=$this->favoritereplycon->singocon?></span>
                    <img class="hidden" src="/public/template/app/img/my_ico.png" alt="내 댓글 수정삭제">
                </button>
            </li>
        </ul>
        <!--E:좋아요,댓글-->
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
                if($row->reply_idx != $row->parent_idx){
                    $class = 'reply';
                }?>
            <li class = '<?=$class?> lireply<?=$row->reply_idx?>'>
                    <?$myclass = 'my';
                    if($row->reply_idx != $row->parent_idx){
                        $myclass = 'myreply'; $row->member_name = '티니'?>
                        <div class="ico-reply center">
                            <img src="/public/template/app/img/reply2.png" alt="대댓글 화살표">
                        </div>
                        <div>
                    <?}?>
                    <div class="left reply_re <?=$class?>" data-my = '<?=$this->myboard->con?>' data-idx = '<?=$row->reply_idx?>'>
                        <?if($row->member_name == NULL){?>
                            <span class = 'no-member'>탈퇴한 회원의 글입니다</span>
                        <?}else{?>
			    <?if($row->member_type == 8){?>
                            	<button class="name"><span style="color:green"><?=$row->member_name?></span></button><span class="date"><?=$time?></span>
			    <?}else{?>
				<button class="name"><span><?=$row->member_name?></span></button><span class="date"><?=$time?></span>
			    <?}?>
                            <?if($row->myreply){?>
                                <button type="button" class = '<?=$myclass?>' data-board = '<?=$row->reply_idx?>'>
                                    <img src="/public/template/app/img/my_ico.png" alt="내 댓글 수정삭제">
                                </button>
                            <?}?>
                            <button type="button" class = 'singo' data-board = '<?=$row->reply_idx?>'>
                                <img src="/public/template/app/img/warning.png" alt="신고하기">
                            </button>
                            <button type="button" class = 'replylike' data-board = '<?=$row->reply_idx?>' class="btn-like"><img src="<?=$img?>" alt="좋아요"></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->



                        	<?$recontent = str_replace(PHP_EOL, ("<br />".PHP_EOL), $row->content);?>

                        <?}?>
                    </div>
                    <div class="">
                        <?if($row->content_image != NULL){?>
                        <img width="200px" src="/public/uploads/mobile/image/<?=$row->content_image?>" style="cursor: pointer;" onclick="doImgPop('/public/uploads/mobile/image/<?=$row->content_image?>')">
                        <?}?>
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
        <?if(($this->view->tony && $this->view->member_type == 5) && ($this->view->tony && $this->view->member_idx != $this->member_idx)){$tony = 'hidden';}?>
        <div id="reply-write" class="reply-write <?=$tony?>"> 
  <form>
    <fieldset>
	<legend>댓글 작성</legend>
	<div class="upload-btn-wrapper">
		<button class="btn" type="button">+</button>
		<input type="file" class="" id='replyimage' accept="image/*"></input>
     	</div>
      	<textarea type="text" class="<?=$tony?>" contenteditable="true" id = 'reply' autocomplete="off" required="false"></textarea>
      	<button type="button" class="button" id='replybutton' data-idx = '<?=$this->view->board_idx?>' data-parent-idx = '' data-reply = ''>등록</button> <!--[D]텍스트 입력시 on class!!-->
      	<input type = 'hidden' value = '<?=$this->view->board_idx?>' id = 'kind'>
    </fieldset>
  </form>
  <div id='image-div' class='image-div'><img src="/public/template/app/img/photo.png" width="15" height="15"><label id='image-label'></label></div></div>
</div>
	<!--<div class="reply-write <?=$tony?>">
            <form>
                <fieldset>
                    <legend>댓글 작성</legend>
                    <input type="text" class="<?=$tony?>" contenteditable="true" id = 'reply' autocomplete="off">
                    <button type="button" class="" id = 'replybutton' data-idx = '<?=$this->view->board_idx?>' data-parent-idx = '' data-reply = ''>등록</button>
                    input type="file" class="<?=$tony?>" id='photobutton' accept="image/*"></input>
                    <input type = 'hidden' value = '<?=$this->view->board_idx?>' id = 'kind'>
                </fieldset>
            </form>
        </div>-->
        <!--E:댓글 작성-->
    </article>
</section>
<script type="text/javascript">
    // $('.txt').height(($('.txt-box').height()-$('.hashtag').height())-65).css({'padding':'40px'});
    $('.txt').css({'padding':'40px'});
    $('.reply-con').css({'margin-bottom':$('.reply-write').height()+10});
</script>

<div class="modal"><!-- Place at bottom of page --></div>

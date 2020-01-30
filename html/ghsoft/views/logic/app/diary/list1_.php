<!-- <??>
<div class="notice-con1">
    <div class="list-con">
        <div class="list-img" style="background-image:url('/public/template/app/img/ex1.jpg');"></div>
        <ul class="list-box">
            <li class="left"><span class="date">3시간전</span></li>
            <li class="right">
                <button type="button"><img src="/public/template/app/img/like_off.png" alt="좋아요"><span>5</span></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png
                <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span>2</span></button>
            </li>
        </ul>
    </div>
</div> -->

<?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);
?>
<?foreach($this->list as $row){
    $alltime = diffDate($row->wdate,"hour");
	$timelen = strlen($alltime);
	if($timelen == 19){
		$timearray = explode(' ',$row->wdate);
		$time = $timearray[0];
	}else{
		$time = $alltime;
	}
    ($row->con)?$img='/public/template/app/img/like_on.png':$img='/public/template/app/img/like_off.png';
    ($row->color)?$class = 'textblack':$class = 'textwhite';
    switch($row->kind){
        case 0 :
        case 1 :
            $board = 'back';
            break;
        case 3 :
            $board = 'fun';
            break;
    }
    if($row->category != 'a'){?>
            <div class="list-con" id = 'list<?=$row->board_idx?>'>
                <a data-url = '/<?=$board?>/view/<?=$row->board_idx?>' data-category = '<?=$row->kind?>' class="list-img newpage" style="background-image:url('/public/uploads/mobile/image/<?=$row->img?>');"></a>

                <a data-url = '/<?=$board?>/view/<?=$row->board_idx?>' data-category = '<?=$row->kind?>' class="list_con-txt category newpage <?=$class?>"><span><?=$row->category?></span></a>
                <a data-url = '/<?=$board?>/view/<?=$row->board_idx?>' data-category = '<?=$row->kind?>' class="list_con-txt newpage txt <?=$class?>"><?=$row->content?></a>
                <a data-url = '/<?=$board?>/view/<?=$row->board_idx?>' data-category = '<?=$row->kind?>' class="list_con-txt newpage hashtag <?=$class?>">
                    <?$hashtag = explode(',',$row->hashtag);
                    $i = 0;
                    while($hashtag[$i]){?>
                        <span><?=$hashtag[$i]?></span>
                    <?$i++;}?>
                </a>

                <ul class="list-box">
                    <li class="left"><span class="date"><?=$time?></span></li>
                    <li class="right">
                        <button type="button"><img src="<?=$img?>" alt="좋아요"><span><?=$row->allcount?></span></button>
                        <!-- D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                        <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$row->replycon?></span></button>
                    </li>
                </ul>
            </div>
        <?}else{
            if(!$row->img){
                $video = substr($row->video,17);
                $url = 'http://www.youtube.com/embed/'.$video;?>

                <div class="list-con" id = 'list<?=$row->board_idx?>'>
                    <a data-url = '/fun/view/<?=$row->board_idx?>' data-category = '<?=$category?>' class="list-img newpage" id="list-play"  style="background-image:url('https://img.youtube.com/vi/<?=$video?>/mqdefault.jpg')"></a>

                <ul data-url = '/fun/view/<?=$row->board_idx?>' data-category = '<?=$row->kind?>' class="list-box">
                <li class="left"><span class="date"><?=$time?></span></li>
                <li class="right">
                    <button type="button"><img src="<?=$img?>" alt="좋아요"><span><?=$row->allcount?></span></button>
                    <!-- D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                    <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$row->replycon?></span></button>
                </li>
            </ul>
        </div>

    <?}else{?>
        <div class="list-con" id = 'list<?=$row->board_idx?>'>
            <a data-url = '/fun/view/<?=$row->board_idx?>' data-category = '<?=$row->kind?>' class="list-img newpage" style="background-image:url('/public/uploads/mobile/image/<?=$row->img?>');"></a>
            <ul class="list-box">
                <li class="left"><span class="date"><?=$time?></span></li>
                <li class="right">
                    <button type="button"><img src="<?=$img?>" alt="좋아요"><span><?=$row->allcount?></span></button>
                    <!-- D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                    <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$row->replycon?></span></button>
                </li>
            </ul>
        </div>
    <?}

}

}
?>

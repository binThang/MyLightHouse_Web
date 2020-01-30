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
    ?>
    <?if(!$row->content_url){?>
    <div id = 'content<?=$row->metoo_idx?>' class="list-con">
	<a data-url = '/metoo/view/<?=$row->metoo_idx?>' data-category = '<?=$array[3]?>' class="list-img newpage" style="background-color:<?=$row->color?>"></a>
        <a data-url = '/metoo/view/<?=$row->metoo_idx?>' data-category = '<?=$array[3]?>' class="list_con-txt category newpage <?=$class?>"><span><?=$row->category?></span></a>
        <a data-url = '/metoo/view/<?=$row->metoo_idx?>' data-category = '<?=$array[3]?>' class="list_con-txt newpage txt <?=$class?>"><?=$row->subject?></a>
        <a data-url = '/metoo/view/<?=$row->metoo_idx?>' data-category = '<?=$array[3]?>' class="list_con-txt newpage hashtag <?=$class?>">
            <span><?=$row->hashtag?></span>
        </a>
    <?}else{?>
    <div id='content<?=$row->metoo_idx?>' class="list-con list-video-con" style="background-color:<?=$row->color?>">
	<img data-url='/metoo/view/<?=$row->metoo_idx?>' data-category='<?=$array[3]?>' class="thumb-img newpage" src='https://img.youtube.com/vi/<?=$row->content_url?>/mqdefault.jpg'/>
	<div class="list-video-con2">
        <a data-url='/metoo/view/<?=$row->metoo_idx?>' data-category='<?=$array[3]?>' class="newpage <?=$class?>"><h1><?=$row->subject?></h1></a>
        <!-- <a data-url='/metoo/view/<?=$row->metoo_idx?>' data-category='<?=$array[3]?>' class="newpage"><h2><?=$row->subject?></h2></a> -->
	    <a data-url='/metoo/view/<?=$row->metoo_idx?>' data-category='<?=$array[3]?>' class="list_con-txt3 hashtag newpage <?=$class?>">
	        <span><?=$row->hashtag?></span>
	    </a>
	</div>
    <?}?>
        <ul class="list-box"  id='reply<?=$row->metoo_idx?>' style="background-color:#FFFFFF">
            <li class="left">
                <span class="date"><?=$time?></span>
            </li>
            <li id = 'list<?=$row->metoo_idx?>' class="right">
                <button type="button"><img src="<?=$img?>" alt="좋아요" class = 'boardlike' data-board = '<?=$row->metoo_idx?>'><span><?=$row->allcount?></span></button>
                <!-- D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png -->
                <button type="button" data-url = '/metoo/view/<?=$row->metoo_idx?>' data-category = '<?=$array[3]?>' class = 'newpage'><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$row->replycon?></span></button>
            </li>
        </ul>
    </div>
<?}?>

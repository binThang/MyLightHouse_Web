<?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);
?>

<?
if (empty($this->list) && $array[5] == 1) {
      require VIEW.'logic/app/search/noresult.php';
}

foreach($this->list as $row){
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
    <div class="list-con">
        <a data-url = '/back/view/<?=$row->board_idx?>' data-category = '<?=$array[3]?>' class="list-img newpage" style="background-image:url('/public/uploads/mobile/image/<?=$row->image?>');"></a>
        <a data-url = '/back/view/<?=$row->board_idx?>' data-category = '<?=$array[3]?>' class="list_con-txt category newpage <?=$class?>"><span><?=$row->category?></span></a>
        <a data-url = '/back/view/<?=$row->board_idx?>' data-category = '<?=$array[3]?>' class="list_con-txt newpage txt <?=$class?>"><?=$row->content?></a>
        <a data-url = '/back/view/<?=$row->board_idx?>' data-category = '<?=$array[3]?>' class="list_con-txt newpage hashtag <?=$class?>">
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

<?}?>

<script type="text/javascript">
    var word = '<?=$array[4]?>';
</script>

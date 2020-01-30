<?
	$url = $_SERVER["REQUEST_URI"];
	$array = explode('/',$url);
    $category = 0;
    if($array[1] == "fun"){
        $category = 1;
    }
?>
	<?foreach($this->list as $row){
		$alltime = diffDate($row->rdate,"hour");
		$timelen = strlen($alltime);
		if($timelen == 19){
			$timearray = explode(' ',$row->rdate);
			$time = $timearray[0];
		}else{
			$time = $alltime;
		}
		$img = explode(',',$row->images);
		$likeimg = '/public/template/app/img/like_off.png';
		if($row->con){
			$likeimg = '/public/template/app/img/like_on.png';
		} ?>
	    <div class="list-con">
	        <a data-url = '/fun/view/<?=$row->funboard_idx?>' data-category = '<?=$category?>' class="list-img newpage" style="background-image:url('/public/uploads/mobile/image/<?=$img[0]?>');"></a>
	    <ul class="list-box">
	        <li class="left"><span class="date"></span></li>
	       	<li id = 'list<?=$row->funboard_idx?>' class="right">
	            <button type="button"><img src="<?=$likeimg?>" alt="좋아요" id = 'like' data-board = '<?=$row->funboard_idx?>' ><span><?=$row->allcount?></span></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png-->
	            <button type="button" data-url = '/fun/view/<?=$row->funboard_idx?>' data-category = '<?=$category?>' class = 'newpage'><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$row->replycon?></span></button>
	        </li>
	    </ul>
	</div>
	<?$i++;}?>

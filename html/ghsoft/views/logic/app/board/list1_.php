<?
    $url = $_SERVER["REQUEST_URI"];
    $array = explode('/',$url);
    $category = 0;
    if($array[1] == "fun"){
        $category = 1;
    }
?>

    <?$i = 0;foreach($this->list as $row){?>
        <div class="list-con">
        <?$alltime = diffDate($row->rdate,"hour");
		$timelen = strlen($alltime);
		if($timelen == 19){
			$timearray = explode(' ',$row->rdate);
			$time = $timearray[0];
		}else{
			$time = $alltime;
		}

        $likeimg = '/public/template/app/img/like_off.png';
		if($row->con){
			$likeimg = '/public/template/app/img/like_on.png';
		}
            // $video = substr($row->video,32);
            $video = substr($row->video,17);
            // echo $video;
            ?>
                <!-- <iframe id="player" type="text/html" width="100%" src="http://www.youtube.com/embed/<?=$video?>" frameborder="0"></iframe> -->
                <a data-url = '/fun/view/<?=$row->funboard_idx?>' data-category = '<?=$category?>' class="list-img newpage" id="list-play"  style="background-image:url('https://img.youtube.com/vi/<?=$video?>/mqdefault.jpg')"></a>
                <ul data-url = '/fun/view/<?=$row->funboard_idx?>' data-category = '<?=$category?>' class="list-box">
                <li class="left"><span class="date"></span></li>    
		<li id = 'lista<?=$row->funboard_idx?>' class="right">
                        <button type="button"><img src="<?=$likeimg?>" id = 'like' data-board = '<?=$row->funboard_idx?>' alt="좋아요"><span><?=$row->allcount?></span></button>
                        <button type="button" data-url = '/fun/view/<?=$row->funboard_idx?>' data-category = '<?=$category?>' class = 'newpage'><img src="/public/template/app/img/reply1.png" alt="댓글"><span><?=$row->replycon?></span></button>
                    </li>
                </ul>
        </div>

        <?$i++;}?>

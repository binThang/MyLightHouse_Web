
<script type="text/javascript">
    $(function(){
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.funlist('4');
        }else if(/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
           window.webkit.messageHandlers.funlist.postMessage('4');
        }
	});
</script>


<?
foreach($this->list as $row){
    ($row->ifread)?$class = 'read':$class='';
    ($row->favorite == 1)?$img='/public/template/app/img/like_off.png':$img='/public/template/app/img/reply1.png';
    $alltime = diffDate($row->wdate,"hour");
    $timelen = strlen($alltime);
    if($timelen == 19){
        $timearray = explode(' ',$row->wdate);
        $time = $timearray[0];
    }else{
        $time = $alltime;
    }
    ?>
    <div class="notice-con2">
        <ul>
            <li><a class = 'newpage alert' data-url = '/back/view/<?=$row->board_idx?>' data-category = '<?=$row->tony?>' data-idx = '<?=$row->alert_idx?>'><p id = 'list<?=$row->board_idx?>' class = '<?=$class?>'><?=$row->title?></p><p class="ico-reply"><img src="<?=$img?>" alt="댓글"><span class="date"><?=$time?></span></p></a></li>
            <!-- <li><a href=""><p>내 글에 공감이 추가되었습니다.</p><p class="ico-reply"><img src="/public/template/app/img/like_off.png" alt="좋아요"><span class="date">18:20</span></p></a></li>
            <li><a href=""><p>내 댓글에 댓글이 추가되었습니다.</p><p class="ico-reply"><img src="/public/template/app/img/reply1.png" alt="댓글"><span class="date">18:20</span></p></a></li>
            <li><a href=""><p>내 댓글에 공감이 추가되었습니다.</p><p class="ico-reply"><img src="/public/template/app/img/like_off.png" alt="좋아요"><span class="date">18:20</span></p></a></li> -->
        </ul>
    </div>
<?}?>
<!-- <div class="notice-con2">
    <ul>
        <li><a href=""><p>내 글에 댓글이 등록되었습니다.</p><p class="ico-reply"><img src="/public/template/app/img/reply1.png" alt="댓글"><span class="date">18:20</span></p></a></li>
        <li><a href=""><p>내 글에 공감이 추가되었습니다.</p><p class="ico-reply"><img src="/public/template/app/img/like_off.png" alt="좋아요"><span class="date">18:20</span></p></a></li>
        <li><a href=""><p>내 댓글에 댓글이 추가되었습니다.</p><p class="ico-reply"><img src="/public/template/app/img/reply1.png" alt="댓글"><span class="date">18:20</span></p></a></li>
        <li><a href=""><p>내 댓글에 공감이 추가되었습니다.</p><p class="ico-reply"><img src="/public/template/app/img/like_off.png" alt="좋아요"><span class="date">18:20</span></p></a></li>
    </ul>
</div> -->

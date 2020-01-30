
<script type="text/javascript">
    $(function(){
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.funlist('3');
        }else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
           window.webkit.messageHandlers.funlist.postMessage('3');
        }
	});
</script>

<?
	$url = $_SERVER["REQUEST_URI"];
	$array = explode('/',$url);
	// echo $array[3];
	if($array[3] == 1)
		$on1 = 'on';
	else if($array[3] == 2)
		$on2 = 'on';
	else
		$on3 = 'on';
?>
<section>
    <article class="list-tit">
        <h2 class="blind">리스트 텍스트</h2>
        <ul>
            <a href = '/fun/list2/1'><li class="<?=$on1?>"><button type="button">명언</button></li></a> <!--[D] 선택되었을때 on class 걸어주세요.-->
            <a href = '/fun/list2/2'><li class="<?=$on2?>"><button type="button">글귀</button></li></a>
            <a href = '/fun/list2/3'><li class="<?=$on3?>"><button type="button">영상</button></li></a>
        </ul>
        <input type="hidden" id="list" value="<?=implode(',',$_SESSION['idx']);?>">
    </article>
    <?if($array[3] != 3){?>
		<article id = 'listup' class="list-area list-area2">
	<?  require VIEW.'logic/app/board/list2_.php';
	}
	else{?>
	    <article id = 'listupv' class="list-area list-area1">
	<?	require VIEW.'logic/app/board/list1_.php';
	  }
    ?>


    <!-- <article class="list-area list-area2">
        <h2 class="blind">이미지 2개씩 나오는 리스트</h2>
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
        <!-- <div class="list-con">
            <div class="list-img" style="background-image:url('/public/template/app/img/ex1.jpg');"></div>
            <ul class="list-box">
                <li class="left"><span class="date">2017-09-06</span></li>
                <li class="right">
                    <button type="button"><img src="/public/template/app/img/like_on.png" alt="좋아요"><span>5</span></button>[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png
                    <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span>2</span></button>
                </li>
            </ul>
        </div>
        <div class="list-con">
            <div class="list-img" style="background-image:url('/public/template/app/img/ex1.jpg');"></div>
            <ul class="list-box">
                <li class="left"><span class="date">2017-09-06</span></li>
                <li class="right">
                    <button type="button"><img src="/public/template/app/img/like_on.png" alt="좋아요"><span>5</span></button> <!--[D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png
                    <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span>2</span></button>
                </li>
            </ul>
        </div>  -->

    </article>
</section>

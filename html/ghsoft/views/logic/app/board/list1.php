<?
	$url = $_SERVER["REQUEST_URI"];
	$array = explode('/',$url);
	// echo $array[3];
	if($array[4] == 1)
		$on1 = 'on';
	else if($array[4] == 2)
		$on2 = 'on';
	else
		$on3 = 'on';
?>

<script type="text/javascript">
    $(function(){
		var array = '<?echo $array[3]?>';
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.funlist(array);
        }else if(/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
          try {
			  window.webkit.messageHandlers.funlist.postMessage(array);

          } catch (e) {

          } finally {

          }
        }
	});
</script>



<section class="">
    <article class="list-tit">
        <h2 class="blind">리스트 텍스트</h2>
        <ul>
            <a href = '/back/list/<?=$array[3]?>/1'><li class="<?=$on1?>"><button type="button">친구에게</button></li></a> <!--[D] 선택되었을때 on class 걸어주세요.-->
            <a href = '/back/list/<?=$array[3]?>/2'><li class="<?=$on2?>"><button type="button">토니에게</button></li></a>
            <a href = '/back/list/<?=$array[3]?>/3'><li class="<?=$on3?>"><button type="button">추천하는</button></li></a>
        </ul>
		<input type="hidden" id="list" value="<?=implode(',',$_SESSION['idx']);?>">
    </article>
    <article  id = 'listup' class="list-area list-area1">
        <h2 class="blind">이미지 1개씩 나오는 리스트</h2>
        <?
    	      require VIEW.'logic/app/board/board_list.php';
        ?>



        <!-- <div class="list-con">
            <div class="list-img" style="background-image:url('/public/template/app/img/ex1.jpg');"></div>
            <ul class="list-box">
                <li class="left"><span class="date">2017-09-06</span></li>
                <li class="right">
                    <button type="button"><img src="/public/template/app/img/like_on.png" alt="좋아요"><span>5</span></button> D] 좋아요 클릭시 아이콘 바뀜 /public/template/app/img/like_on.png
                    <button type="button"><img src="/public/template/app/img/reply1.png" alt="댓글"><span>2</span></button>
                </li>
            </ul>
        </div> -->
    </article>
</section>

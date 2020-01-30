
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
<script type="text/javascript">
    $(function(){
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.funlist('4');
        }else if(/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
           window.webkit.messageHandlers.funlist.postMessage('4');
        }
	});
</script>

<section>
    <article id="notice-tit" class="list-tit">
        <h2 class="blind">나의 다이어리 텍스트</h2>
        <ul>
            <li class = '<?=$on1?>'><a href = '/diary/list/1'><button type="button">내 공감</button></a></li>
            <li class = '<?=$on2?>'><a href = '/diary/list/2'><button type="button">내 글 보기</button></a></li>
            <li class="<?=$on3?>"><a href = '/diary/list/3'><button type="button">알림</button></a></li> <!--[D] 선택되었을때 on class 걸어주세요.-->
        </ul>
    </article>
<input type="hidden" id="list" value="<?=implode(',',$_SESSION['idx']);?>">
	<!-- <article id="notice-area" class="list-area list-area1"> -->
        <h2 class="blind">나의 다이어리 내용</h2>
        <article  id = 'listup' class="list-area list-area1">
        <?if($array[3] != 3){?>
        <?  require VIEW.'logic/app/diary/list1_.php';?>

<? }
        else{?>
        <?	require VIEW.'logic/app/diary/alert_list.php';
          }
        ?>
    </article>
</section>


<script type="text/javascript">
    $(function(){
        if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.funlist('2');
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
			<a href = '/metoo/list/1'><li class="<?=$on1?>"><button type="button">수기</button></li></a> <!--[D] 선택되었을때 on class 걸어주세요.-->
			<a href = '/metoo/list/2'><li class="<?=$on2?>"><button type="button">영상</button></li></a>
			<a href = '/metoo/list/3'><li class="<?=$on3?>"><button type="button">추천하는</button></li></a>
		</ul>
		<input type="hidden" id="list" value="<?=implode(',',$_SESSION['idx']);?>">
	</article>
	<article id = 'listup' class="list-area list-area3">
		<h2 class="blind">수기/수기영상 리스트</h2>
		<?
			require VIEW.'logic/app/board/list3_.php';
	       	?>
	</article>
</section>

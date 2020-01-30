<?
	$url = $_SERVER["REQUEST_URI"];
	$array = explode('/',$url);
	// echo $array[3];
?>

<script type="text/javascript">
    $(function(){
		var array = '<?echo $array[4]?>';
		var swit = '<?echo $array[3]?>';
		if(array == 'null'){
			switch(swit){
				case '1':
					array = '친구';
					break;
				case '2':
					array = '가족';
					break;
				case '3':
					array = '외모';
					break;
				case '4':
					array = '학교';
					break;
				case '5':
					array = '공부';
					break;
				case '6':
					array = '성격';
					break;
				case '7':
					array = '이성';
					break;
				case '8':
					array = '꿈';
					break;
				case '9':
					array = '감정';
					break;
				case '10':
					array = '기타';
					break;
			}
		}

		console.log(decodeURIComponent(array));
	    if( /Android/i.test(navigator.userAgent)) {
           window.lighthouse.sname(decodeURIComponent(array));
        }else if(/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
           window.webkit.messageHandlers.sname.postMessage(array);
        }
	});
</script>

<section class="">
    <article  id = 'listup' class="list-area list-area1">
        <h2 class="blind">이미지 1개씩 나오는 리스트</h2>
        <?
    	      require VIEW.'logic/app/search/list_.php';
        ?>

    </article>
</section>

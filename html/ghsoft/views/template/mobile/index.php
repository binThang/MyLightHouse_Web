<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php
		include VIEW.MOBILE_T."head.php";
		?>
	</head>
	<body>
			<?php
			include VIEW.MOBILE_T."header.php";
			include VIEW.MOBILE_T."aside.php";
			if($url){
				include VIEW.$url;
			}else{
				include VIEW.MOBILE."main/index.php";
			}
			include VIEW.MOBILE_T."footer.php";
			?>
	</body>
</html>

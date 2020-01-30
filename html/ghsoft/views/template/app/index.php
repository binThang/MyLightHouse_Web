<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php
		include VIEW.APP_T."head.php";
		?>
	</head>
	<body>
			<?php
			include VIEW.APP_T."header.php";
			include VIEW.APP_T."aside.php";
			if($url){
				include VIEW.$url;
			}else{
				include VIEW.APP."main/index.php";
			}
			include VIEW.APP_T."footer.php";
			?>
	</body>
</html>

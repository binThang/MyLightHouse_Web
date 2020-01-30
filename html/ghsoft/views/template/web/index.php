<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php
		include VIEW.WEB_T."head.php";
		?>
	</head>
	<body>
			<?php
			include VIEW.WEB_T."header.php";
			include VIEW.WEB_T."aside.php";
			if($url){
				include VIEW.$url;
			}else{
				include VIEW.WEB."main/index.php";
			}
			include VIEW.WEB_T."footer.php";
			?>
	</body>
</html>

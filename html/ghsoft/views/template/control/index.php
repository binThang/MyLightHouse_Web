<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php
		include VIEW.CONTROL_T."head.php";
		?>
	</head>
	<body>
			<?php
			include VIEW.CONTROL_T."header.php";
			include VIEW.CONTROL_T."aside.php";
			if($url){
				include VIEW.$url;
			}else{
				include VIEW.CONTROL."main/index.php";
			}
			include VIEW.CONTROL_T."footer.php";
			?>
	</body>
</html>

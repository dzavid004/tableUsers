<!DOCTYPE html>

<html>  
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Заголовок страницы</title>
		<link rel="stylesheet" href="/temp/styles/main.css" />
	</head>
	
	<body>
		<div id="Wrapper">
			<div id="leftside">
				<div class="contentBox">
					<div class="info"><?=$content?></div>
				</div>
			</div>
			<div id="rightside">
				<div class="contentBox">
					<div class="info">
						<?
							include 'temp/sidebar.php';
						?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
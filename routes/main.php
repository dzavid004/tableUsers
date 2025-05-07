<h1><?=$lang[$selectLang]['mainPagetitle']?></h1>

<?
	

	
	if($_COOKIE['lastVisit']){
		echo "<b>".$lang[$selectLang]['date'].":  ".date('d.m.Y : h:i:s', $_COOKIE['lastVisit'])."</b>";
	}
	
	
?>

<p> <?=$lang[$selectLang]['mainText']?></p>
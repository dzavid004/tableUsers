<?
	if($_SESSION['userInfo']){
		session_unset();
		session_destroy();
		//Автоматически переносит на глвную страницу после деавторизации 
		header ('Location: /');
	}else{
		echo 'Вы не авторизованы';
	}
?>
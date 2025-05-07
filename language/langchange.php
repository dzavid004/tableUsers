<?
	// Основной язык на сайте
	$mainLang = 'kz';
	
	// Когда пользователь нажимает на ссылку, в GET появляется значение lang и если оно равно kz, то ему передаётся это значение
	if($_GET['lang']){
		if($_GET['lang'] == 'kz') $_SESSION['selectlang'] = 'kz';
		elseif($_GET['lang'] == 'ru') $_SESSION['selectlang'] = 'ru';
		elseif($_GET['lang'] == 'en') $_SESSION['selectlang'] = 'en';
	}

	// Создание пременной, в которой будет выбранный язык
	$selectLang = '';
	
	// Смотрим наличие выбранного языка	из GET и после всего процесса присваивается значение в переменную $selectLang
	if($_SESSION['selectlang']){
		if($_SESSION['selectlang'] == 'kz') $selectLang = 'kz';
		elseif($_SESSION['selectlang'] == 'ru') $selectLang = 'ru';
		elseif($_SESSION['selectlang'] == 'en') $selectLang = 'en';
		else{
			 $selectLang = $mainLang;
		}
	}else{
		$selectLang = $mainLang;
	}
?>
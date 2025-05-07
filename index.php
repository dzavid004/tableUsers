
	<?
	
		// Code Protect
		
		define ('ENGINE', true);
	
	
		//ПОДКЛЮЧЕНИЕ К БАЗЕ ДАННЫХ
		include 'inc/db.php';
		
		//Запуск сессии пользоваеля
		session_start();
		
		//Подключение библиотеки собственных функций
		include 'libs/fuction.php';
		
		//Подключение файла с доп языками
		include 'language/lang.php';
		
		include 'language/langchange.php';
		
		
		
		//Запрашиваем актуальные данные пользоваеля
		
		if($_SESSION['userInfo']){
			$_SESSION['userInfo'] = getMeAuthUserInfo();
	
		}
		
		if($db){
			// Создание перменной которая будет проверять гет запрос. Можно и без неё
			$module = $_GET['module'];
			
			//Функция буферизации 
			ob_start();
			
			/*Роутинг. Если ячейка массива GET с названием module будет
			равна названию файла, который мы подключаем, то перекидываем пользоваеля на ту страницу, которую он хотел*/
			if($module == 'allUsers'){
				include 'routes/allUsers.php';
				
			}elseif($module == 'registration2'){
				include 'routes/registration2.php';
				
			}elseif($module == 'avtorisation'){
				include 'routes/avtorisation.php';
				
			}
			elseif($module == 'deauth'){
				include 'routes/deauth.php';
				
			}
			elseif($module == 'editUsers'){
				include 'routes/editUsers.php';
				
			}
			elseif($module == 'deleteUsers'){
				include 'routes/deleteUsers.php';
				
			}
			else{
				include 'routes/main.php';
			}
			
			// Запихиваем весь код выше в эту переменную и можно будет вывести его где угодно
			$content = ob_get_contents();
			
			//Конец буферизации
			ob_end_clean();
			
			//Создание куки, которая запоминает последний визит пользователя
			setcookie('lastVisit', time(), time()+999999);
		}else{
			$content = 'Ошибка подключения к базе данных';
		}
		//Подключение шаблона
		include 'temp/pageWrapper.php';
		

	
	
	
	?>

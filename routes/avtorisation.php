<h1>Форма авторизации</h1>

<?
	if(empty($_SESSION['userInfo'])){
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$userLogin = mysqli_real_escape_string($db, $_POST['login']); 
			$password1 = $_POST['password1']; 
			$userCity = (int) $_POST['CITY']; 
			$trast = ''; 
			
			if(mb_strlen($userLogin) < 4) $trast .= '<li>Длина логина меньше 4 символов</li>';
			if(empty($password1)) $trast .= '<li>Не указан пароль</li>';
			if(mb_strlen($password1) < 8) $trast .= '<li>Длина пароля меньше 8 символов</li>';
			
			
			if(empty($trast)){
				//Хеширование пароля
				$userPassword = md5(md5($password1."____LOL"));
				
				//Создание SQL запроса 
				$SQL = "SELECT * FROM `table_users` WHERE userLogin='{$userLogin}' AND userPassword='{$userPassword}'";	
				
				$result = mysqli_query($db, $SQL);
								
				//проверка наличия пользователя
				if(mysqli_num_rows($result)){
					//создание новой ячейки в массие $_SESSION, если пользователь зарегистрирован
					$_SESSION['userInfo'] = mysqli_fetch_assoc($result);
					//Автоматически переносит на глвную страницу после авторизации 
					header ('Location: /');
				}else{
						echo '<h3>Ошибка:</h3>';
						echo 'Пользователь с таким логином и паролем не существуют';
					}
			}else{
				echo '<h3>Ошибка заполнения форм регистрации: 	</h3>';
				echo '<ul>';
					echo $trast;
				echo '</ul>';
			}
		}else{
				include 'temp/avtoform.php';
			}	
	}else{
		echo 'Вы уже авторизованы ;)';
	}	
	
?>
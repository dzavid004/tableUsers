
<?
	if(!defined('ENGINE')) die('No hacking');
?>

<h1>Редактирование пользователя</h1>

<?
	// Проверка на администратора
	if(isAdmin()){
		$editUserId = (int) $_GET['id'];
		
		dump($editUserId);
		
		
		if($editUserId){
			// Запрос в базу данных, который ищет такой айди
			$SQL = "SELECT * FROM `table_users` WHERE id = '{$editUserId}' ";
			
			$result = mysqli_query($db, $SQL);
			
			// Если такой ID есть, то можно начинать редактирование
			if(mysqli_num_rows($result)){
					// Информация о пользователе в массиве 
					$editUserInfo =  mysqli_fetch_assoc($result);                                         
					
					// Если пользователь нажал на кнопку, то начинать процесс редактирования 
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
					// Создание переменных с информацией, которую введет пользователь и чек ошибок	
					$userLogin = mysqli_real_escape_string($db, $_POST['login']);
					$userCity = (int)$_POST['CITY'];
					$userStatus = $_POST['userStatus'];
					$trast = ''; 
					
					// Провекрка ошибок 
					if(mb_strlen($userLogin) < 4) $trast .= '<li>Длина логина меньше 4 символов</li>';
					if(mb_strlen($userLogin) > 32) $trast .= '<li>Длина логина больше 32 символов</li>';
					if(empty($userCity)) $trast .= '<li>Не указан город</li>';
					
					// Если поставили галочку в поле "Возможности администратора",
					//то перезаписать переменную на единицу и дать админку
					if($userStatus == 'on'){
						$userStatus = 1;
					}else $userStatus = 2;
					
					if($_POST['password']){
						$newPassword = $_POST['password'];
						$changePassword = true;
						
						if(mb_strlen($newPassword) < 4) $trast .= '<li>Длина логина меньше 4 символов</li>';
					}
					
					// Если ошибок нет, начинать проверку логина
					if(empty($trast)){
						// Переменная $changeLogin изначально пустая
						$changeLogin = false;
						// Проверка логина. Если логин изначально равен тому, который был,
						// значит его не трогали и производить проверку не нужно. 
						// А если он НЕ равен ему, то начинаем процесс проверки
						if($userLogin != $editUserInfo['userLogin']){
							
							// Если мы всё таки начали процесс проверки, переменная $changeLogin 
							// станочится true
							$changeLogin = true;
							// Переменная $searchNewLoginInTable изначально true
							$searchNewLoginInTable = true;
							// Проверка дубликата логина 
							$SQL_LOGIN = "SELECT * FROM `table_users` WHERE `userLogin` = '{$userLogin}'";	
							$login_result = mysqli_query($db, $SQL_LOGIN);
							
							// Если логин не похож ни на один в базе данных, то начинать процесс редактирования
							if(mysqli_num_rows($login_result) == 0){
								// Если одинакового пользователя не нашли,
								//то Переменная $searchNewLoginInTable станочится false
								$searchNewLoginInTable = false; 
							}else{
								echo 'Такой пользователь уже существует';
							}
						}
						
						// Новый пароль, при необходимости 
						
						if($changePassword){
							$newPassword = getHash($newPassword);

						}
						
						
						// Запрос на изменение инфы в базу данных
						$UPDATE = "UPDATE `table_users` SET ";
						
						if($changeLogin and $searchNewLoginInTable == false){
							$UPDATE .= "userLogin = '{$userLogin}', ";
						}
						
						if($changePassword){
							$UPDATE .= "userPassword = '{$newPassword}', ";
						}
						
						$UPDATE .= "userCity='{$userCity}',
						userStatus='{$userStatus}'
						WHERE id='{$editUserId}'";
						
						// Просто проверка дубликата логина, без дополнения запроса
						if($searchNewLoginInTable == false){
							// Долгожданный запрос в базу данных 😍
							$result = mysqli_query($db, $UPDATE);
							
							if($result){
								echo 'Редактировние прошло успешно, держи печеньку 🍪';
							}else{
								echo 'Ошибка: Не удалось сохранить изменения, попробуте позже';
							}
						}else{
							echo 'Ошибка: Такой пользователь уже существует';
						}
						
						
					}else{
						echo '<h3>Ошибка заполнения форм регистрации: 	</h3>';
						echo '<ul>';
							echo $trast;
						echo '</ul>';
					}
					
				}else{
					
					include 'temp/editUserform.php';
				}
			}else{
				echo 'Пользователя с таки ID нет';
			}
		}else{
			echo 'Не указан ID редактируемого пользователя';
		}
	}else{
		echo 'Вася, гуляй!';
	}
?>
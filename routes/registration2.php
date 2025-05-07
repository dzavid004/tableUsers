<?
	if(!defined('ENGINE')) die('No hacking');
?>

<h1>Форма регистрации</h1>

<?
	if(empty($_SESSION['userInfo'])){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
			$userLogin = mysqli_real_escape_string($db, $_POST['login']); 
			$password1 = $_POST['password1']; 
			$password2 = $_POST['password2']; 
			$userCity = (int) $_POST['CITY'];
			$userRegDate = time();
			$trast = ''; 
			
			if(mb_strlen($userLogin) < 4) $trast .= '<li>Длина логина меньше 4 символов</li>';
			if(mb_strlen($userLogin) > 32) $trast .= '<li>Длина логина больше 32 символов</li>';
			if(empty($password1)) $trast .= '<li>Не указан пароль</li>';
			if($password1 != $password2) $trast .= '<li>Пароли разные</li>';
			if(mb_strlen($password1) < 8) $trast .= '<li>Длина пароля меньше 8 символов</li>';
			if(mb_strlen($password1) > 64) $trast .= '<li>Длина пароля больше 64 символов</li>';
			if(empty($userCity)) $trast .= '<li>Не указан город</li>';

			// Процедура проверки дубликата логина
			$dublicateSQL = "SELECT * FROM `table_users` WHERE `userLogin` = '{$userLogin}'";	
			$result = mysqli_query($db, $dublicateSQL);
			if(mysqli_num_rows($result)) $trast .= '<li>Такой пользователь уже существует</li>';
			
			if(empty($trast)){
				//Хеширование пароля
				$userPassword = getHash($password1);
				
				//ДОПОЛНИТЕЛЬАЯ ИНФОРМАЦИЯ
				$userIP = $_SERVER['REMOTE_ADDR'];
				
				$SQL = "INSERT INTO `table_users` (`userLogin`, `userPassword`, `userRegDate`,
				`userCity`, `userStatus`, `userIP`) 
				VALUES ('{$userLogin}', '{$userPassword}', {$userRegDate}, {$userCity},
				2, '{$userIP}')";
				
				$r = mysqli_query($db, $SQL);
				
				if($r){	
					echo 'Вы зарегестрировались, вот айди:'.mysqli_insert_id($db);
				}else echo 'Вы  не зарегестрировались';
			}else{
				echo '<h3>Ошибка заполнения форм регистрации: 	</h3>';
				echo '<ul>';
					echo $trast;
				echo '</ul>';
			}
		}else{
			include 'temp/regform.php';
		}
	}else{
		echo 'Вы уже зарегестрированы ;)';
	}	
?>	
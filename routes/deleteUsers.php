<h1>Удаление пользователя</h1>

<?
	// Проверка на администратора
	if(isAdmin()){
		$deleteUserId = (int) $_GET['id'];
		
		if($deleteUserId){
			// Запрос в базу данных, который ищет такрой айди
			$SQL = "SELECT userLogin FROM `table_users` WHERE id = '{$deleteUserId}' ";
			
			$result = mysqli_query($db, $SQL);
			
			// Если такой ID есть, то можно начинать редактирование
			if(mysqli_num_rows($result)){
					// Информация о пользователе в массиве 
					$deleteUserInfo =  mysqli_fetch_assoc($result);                                         
					
					// Если пользователь нажал на кнопку, то начинать процесс редактирования 
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
										
					if($_POST['delete'] == 'true'){
						
						$DELETE = "DELETE FROM `table_users` WHERE `id` = {$deleteUserId}";
	
						$delResult = mysqli_query($db, $DELETE);
						if($delResult){
							echo 'Удаение прошло успешно, держи пончик 🍩';
						}else{
							echo 'Удаление не получилось, попробуй позже';
						}
						
					}else{
						echo 'ошибка хз какая';
					}
		
				}else{
					
					include 'temp/deleteUserform.php';
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
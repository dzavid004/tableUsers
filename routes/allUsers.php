<h1>Вывод всех пользователей</h1>
<?php


	if($_SESSION['userInfo']){

		$SQL = 'SELECT * FROM table_users';

		$result = mysqli_query($db, $SQL);

		if($result){	
			
			if(mysqli_num_rows($result)){
				$allUsers = $result;
				$adminTH = return_admin('<th>Действие</th>');
				
				echo "<table border='1px'>
					<tr> <th>ID</th> <th>userLogin</th> <th>regDate</th> <th>userCity</th> <th>userIP</th> {$adminTH} </tr>";	
				
					
				foreach($allUsers as $user){
					include 'temp/user.php';
				}
				echo "</table>";
			}else{
				echo "Ошибка: В базе даных нет записей";
			}
			
		}else {
			echo "Ошибка: Запрос не удалось выполнить";
		}
}else{
	echo 'Эта страница доступна только авторизованным пользователям';
}
?>
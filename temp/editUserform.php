<?
	if(!defined('ENGINE')) die('No hacking');
?>

	<form method="POST" action="">
		<p> 
			Логин пользователя:  <input type="text" name="login" value="<?=$editUserInfo['userLogin']?>"/>
			<small><i><span style="color:red;">*</span> Не менее 4 символов</i></small>
		</p>
		<p> 
			Новый пароль:  <input type="password" name="password" />
			<small><i><span style="color:#777;">(не обязательно)</span></i></small>
		</p>
		<p>
			<p>Город проживания пользователя: 
				<select name="CITY">
					<option disabled selected>Укажите город</option>
					<?=renderCityOption($editUserInfo['userCity']);?>
				</select>
			</p>	
		</p>
		
		<p>
			<p>Возможности админстратора: 
				<input name="userStatus" type="checkbox"
				<?if($editUserInfo['userStatus'] == 1) echo 'checked'?> />
			</p>	 
		</p>
		
		<input type="submit" value="Сохранить"/>
	</form>
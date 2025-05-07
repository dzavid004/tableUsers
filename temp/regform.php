	<form method="POST" action="">
		<p> <?$time = time();?>
			Введите логин:  <input type="text" name="login" placeholder="Введите логин"/>
			<small><i><span style="color:red;">*</span> Не менее 14 символов</i></small>
		</p>
		<p>
			Введите пароль:  <input type="password" name="password1" placeholder="Введите пароль"/> 
			<small><i><span style="color:red;">*</span> Не менее 8 символов</i></small>
		</p>
		<p> 
			Введите пароль ещё раз:  <input type="password" name="password2" placeholder="Введите пароль"/>
			<small><i><span style="color:red;">*</span> Не менее 8 символов</i></small>			
		</p>
		<p>
			<p>Укажите свой город: 
				<select name="CITY">
					<option disabled selected>Укажите город</option>
					<?=renderCityOption();?>
				</select>
			</p>	
		</p>
		
		<input type="submit" value="Регистрация"/>
	</form>
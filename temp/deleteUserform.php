	<form method="POST" action="">
		Вы уверены, что хотите удалить пользователя <?=$deleteUserInfo['userLogin']?>?
		<br/>
		<br/>
		<input type="hidden" name="delete" value="true" />
		<br/>
		<br/>
		<input type="submit" value="ДА!"/>
	</form>
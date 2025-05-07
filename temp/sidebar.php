<!-- Шаблон со списком страниц вместе с ссылками, который мы подключаем к основному файлу -->
	<h3><?=$lang[$selectLang]['navig']?></h3>
	<ul>
		<li> <a href="/"><?=$lang[$selectLang]['glav']?></a></li>
		<?
			if($_SESSION['userInfo']["userCity"] == 1){
				echo '<li> <a href="/?module=Almaty">Тавары для Алматинцев</a></li>';
			}
		?>
		<li> <a href="/?module=allUsers"><?=$lang[$selectLang]['polzovatel']?></a></li>
		<?if(empty($_SESSION['userInfo'])){?>
			<li> <a href="/?module=registration2"><?=$lang[$selectLang]['reg']?></a></li>
			<li> <a href="/?module=avtorisation"><?=$lang[$selectLang]['avt']?></a></li>
		<?}else echo '<li> <a href="/?module=deauth">'.$lang[$selectLang]['vihod'].'</a></li>';?>
	</ul>
	<h3><?=$lang[$selectLang]['lang']?></h3>
	<ul id="lang">
		<li><a href="/?lang=kz" <? if($selectLang == 'kz') echo 'class="active_lang"';?>>KZ</a></li>
		<li><a href="/?lang=ru" <? if($selectLang == 'ru') echo "class='active_lang'";?>>RU</a></li>
		<li><a href="/?lang=en" <? if($selectLang == 'en') echo "class='active_lang'";?>>EN</a></li>
	</ul>
	<?
		if($_SESSION['userInfo']){ 
			echo $lang[$selectLang]["dobro"].', <b class="active_lang">'.$_SESSION['userInfo']["userLogin"].'</b>!<br/><br/>';
		
			if($_SESSION['userInfo']['userStatus'] == 1){
				echo $lang[$selectLang]["tipAkk"].': <b class="active_lang">Администратор</b>';
			}else{
				echo 'Тип аккаунта: <b>Пользователь</b>';
			}
		}else{
			echo '<span style="margin-left:18px;">'.$lang[$selectLang]['notAvt'].'</span>';
		}
	?>
	

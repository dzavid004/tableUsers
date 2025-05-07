<?php
	function dump($value){
		echo "<pre>";
			var_dump($value);
		echo "</pre>";
	}
	
	function getMeAuthUserInfo(){
		global $db;
		
		$userLogin = $_SESSION['userInfo']['userLogin'];
		$SQL = "SELECT * FROM `table_users` WHERE `userLogin` = '{$userLogin}'";
		
		$r = mysqli_query($db, $SQL);
		
		if($r){
			if(mysqli_num_rows($r)){
				return mysqli_fetch_assoc($r);
			}
		}
		
		return false;
	}
	
	function isAdmin(){
		if($_SESSION['userInfo']['userStatus'] == 1) return true;
		return false;
	}
	
	function echo_admin($text){
		if(isAdmin()) echo $text;
	}
	
	function return_admin($text){
		if(isAdmin()) return $text;
		return '';
	}
	
	$allCity = [
		1 => 'Алмата',
		2 => 'Астана',
		3 => 'Бишкек',
		4 => 'Караганда'
	];
	
	function renderCityOption($selected = false){
		global $allCity;
		
		$r = '';
		
		foreach($allCity as $value => $option){
			$s = '';
			if($selected == $value) $s = 'selected';
			
			$r .= "<option value='{$value}' {$s}>{$option}</option> ";
		
			
		}
		return $r;
	}
	
	function getHash($password){
		return md5(md5($password."____LOL"));
	}
	
	
?>
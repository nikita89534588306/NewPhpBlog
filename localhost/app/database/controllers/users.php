<?php
	if(isset($_POST['login'])){

		extract($_POST);		//деструктуризируем данные из формы регистрации
		$user_password = password_hash($user_password, PASSWORD_DEFAULT);		//хешируем пароль
		//$role = 0; 		//присваиваем роль пользователя user												

		queryDB("INSERT INTO webPhp.users (username, email, user_password) VALUES ( '$login', '$email', '$user_password');"); 

		
}
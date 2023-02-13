<?php
	if(isset($_POST['login'])){
		
		extract($_POST);		//деструктуризируем данные из формы регистрации
		$user_password = password_hash($user_password, PASSWORD_DEFAULT);		//хешируем пароль
		//$role = 0; 		//присваиваем роль пользователя user												

		// var_dump($login);
		// var_dump($email);
		// var_dump($password);
		// var_dump($passwordConfirm);
		
}
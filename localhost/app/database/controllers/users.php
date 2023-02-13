<?php
	$errMsg = '';

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		//извлекаем данные из массива POST и отчищаем от пробелов
			$login = trim($_POST['login']);
			$email = trim($_POST['email']);
			$user_password = trim($_POST['user_password']);
			$passwordConfirm = trim($_POST['passwordConfirm']);

		//ВАЛИДАЦИЯ
		/*проверка заполнены ли поля...*/ 
		if( $login === ''|| $email === '' || $user_password === '' || $passwordConfirm === '')
				$errMsg = "Не все поля заполнены";
		// else if(){

			
		// }
		else{
			// $user_password = password_hash($user_password, PASSWORD_DEFAULT);		//хешируем пароль
			// queryDB("INSERT INTO webPhp.users (username, email, user_password) VALUES ( '$login', '$email', '$user_password');");  //добавляем пользователя в БД
		}
		
	}else if($_SERVER['REQUEST_METHOD'] === 'GET'){

	}
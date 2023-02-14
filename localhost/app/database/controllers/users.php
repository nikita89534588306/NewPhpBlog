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
		// проверяем логин - не короче 2х символов		
		else if(mb_strlen($login, 'UTF8') < 2)
			$errMsg = "Логин не может быть короче 2-х символов";
		//проверка подтверждения пароля
		else if($user_password !== $passwordConfirm)
			$errMsg = "Пароли не совпадают";
		else{
			//проверяем есть ли в БД данные емайл
			$isNotUniqueEmail = queryDB("SELECT id FROM users WHERE email = '$email' LIMIT 1")->fetch();
			//если есть выводим ошибку
			if($isNotUniqueEmail){
				$errMsg = "Пользователь с данной почтой уже зарегестрирован!";
			}
			else{
				//хешируем пароль
				$user_password = password_hash($user_password, PASSWORD_DEFAULT);		//хешируем пароль
				//заносим в базу данных
				queryDB("INSERT INTO webPhp.users (username, email, user_password) VALUES ( '$login', '$email', '$user_password');");  //добавляем пользователя в БД

				//... ДАЛЕЕ ИДЕТ ЛОГИКА РАБОТЫ С СЕССИЯМИ ...
				$dataUser = queryDB(
					"SELECT users.id, users.username, roleVariants.name_role
						FROM users
						JOIN roleVariants ON users.user_role = roleVariants.id
						ORDER BY id DESC
						LIMIT 1")->fetch();
				//printData($dataUser);
				$_SESSION['id'] = $dataUser['id'];
				$_SESSION['username'] = $dataUser['username'];
				$_SESSION['name_role'] = $dataUser['name_role'];
				header('location: /');
				
			}	
		}		

	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$login = '';
		$email = '';
	}
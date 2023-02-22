<?php
	$errMsg = [];
	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id_user'])){
		$id = $_GET['del_id_user'];
		
		printData($id);
		
		printData("DELETE FROM users 
		WHERE id='$id'");
		// die();
		queryDB(
			"DELETE FROM users 
				WHERE id='$id'"
		);
		if($_SESSION['name_role']=="admin")  header('location: /admin/users/index.php');
		elseif($_SESSION['name_role']=="user") header('location: /');
	}	
	//create
	$all_users = queryDB(
		"SELECT 
			users.id AS id_user, 
			users.username AS name_user, 
			users.email AS email_user,
			roleVariants.name_role AS role_user 
		FROM users
		JOIN roleVariants ON users.user_role = roleVariants.id"
	)->fetchAll();


	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
		//printData($_GET);
		$id_user = $_GET['id'];
		$user = queryDB(
			"SELECT 
				users.id AS id_user, 
				users.username AS name_user, 
				users.email AS email_user,
				roleVariants.name_role AS role_user 
			FROM users 
			JOIN roleVariants ON users.user_role = roleVariants.id
			WHERE users.id = '$id_user'"
		)->fetch();

		extract($user);
		printData($user);
	}
	else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user']))
	{
		//printData($_POST);
		//извлекаем данные из массива POST и отчищаем от пробелов
			$id_user = trim($_POST['id_user']);
			$name_user = trim($_POST['name_user']);
			$email_user = trim($_POST['email_user']);
			$user_password = trim($_POST['user_password']);
			$passwordConfirm = trim($_POST['passwordConfirm']);
			$status_user = (!empty($_POST['isAdmin'])) ?  $_POST['isAdmin'] : 0 ;
			$resetPasword = (!empty($_POST['resetPassword'])) ?  $_POST['resetPassword'] : 0 ;

		echo "<strong>Проверка данных полученных из метода ПОСТ</strong><br>";
		echo "ID: ". $id_user . "<br>";
		echo "Login: ". $name_user . "<br>";
		echo "Email: ". $email_user. "<br>";
		echo "User password: ". $user_password. "<br>";
		echo "Password confirm: ". $passwordConfirm. "<br>";
		echo "Пароли совпадают: " . $isPasswordEqual = ($user_password == $passwordConfirm) ? "Да" : "Нет"; echo "<br>";
		echo "Статус пользователя: " .$userStatus = ($status_user) ? "Админ" : "Пользователь"; echo "<br>";
		echo "Сброс пароля: " . $passwordCondition = ($resetPasword) ? "Да" : "Нет"; echo "<br>";

		

		//ВАЛИДАЦИЯ
		/*проверка заполнены ли поля...*/ 
		if( $name_user === ''|| $email_user === '')
			array_push($errMsg, "Не все поля заполнены");
		// проверяем логин - не короче 2х символов		
		else if(mb_strlen($name_user, 'UTF8') < 2)
			array_push($errMsg, "Логин не может быть короче 2-х символов");
		//проверка подтверждения пароля


		if($resetPasword == true && ($user_password === ''|| $passwordConfirm === ''))
			array_push($errMsg, "Не все поля заполнены");
		else if($resetPasword == true && ($user_password !== $passwordConfirm))
			array_push($errMsg, "Пароли не совпадают");
		else{
			//проверяем есть ли в БД данные емайл
			$isNotUniqueEmail = queryDB("SELECT id FROM users WHERE email = '$email_user' AND NOT id='$id_user' LIMIT 1")->fetch();
			//если есть выводим ошибку
			if($isNotUniqueEmail) 
			array_push($errMsg, "Пользователь с данной почтой уже зарегестрирован!");
		}

		echo "<br><strong>Количество ошибок валидации: " .count($errMsg) ."</strong><br>";
		if(count($errMsg)!==0){  echo "<ul>"; foreach ($errMsg as $key => $value) echo "<li>".$value; echo "</ul>"; }
		//var_dump($errMsg);
		// die();
		if(count($errMsg)===0)
		{
			$user_role = $status_user + 1;
			queryDB("
				UPDATE webPhp.users
				SET username = '$name_user',
					email = '$email_user',
					user_role = '$user_role'
					WHERE id='$id_user'; 
			"); 
			if($resetPasword){
				$user_password = password_hash($user_password, PASSWORD_DEFAULT);
				queryDB("UPDATE webPhp.users SET user_password = '$user_password' WHERE id='$id_user'; "); 	
			}
			if($_SESSION['name_role']=="admin")  header('location: /admin/users/index.php');
			elseif($_SESSION['name_role']=="user") header('location: /');
		}
	}


	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-reg'])){

		//извлекаем данные из массива POST и отчищаем от пробелов
			$login = trim($_POST['login']);
			$email = trim($_POST['email']);
			$user_password = trim($_POST['user_password']);
			$passwordConfirm = trim($_POST['passwordConfirm']);

		echo "<strong>Проверка данных полученных из метода ПОСТ</strong><br>";
		echo "Login: ". $login . "<br>";
		echo "Email: ". $email. "<br>";
		echo "User password: ". $user_password. "<br>";
		echo "Password confirm: ". $passwordConfirm. "<br>";
		echo "Пароли совпадают: " . $isPasswordEqual = ($user_password == $passwordConfirm) ? "Да" : "Нет"; 
		echo "<br>";

		//ВАЛИДАЦИЯ
		/*проверка заполнены ли поля...*/ 
		if( $login === ''|| $email === '' || $user_password === '' || $passwordConfirm === '')
			array_push($errMsg, "Не все поля заполнены");
		// проверяем логин - не короче 2х символов		
		else if(mb_strlen($login, 'UTF8') < 2)
			array_push($errMsg, "Логин не может быть короче 2-х символов");
		//проверка подтверждения пароля
		else if($user_password !== $passwordConfirm)
			array_push($errMsg, "Пароли не совпадают");
		else{
			//проверяем есть ли в БД данные емайл
			$isNotUniqueEmail = queryDB("SELECT id FROM users WHERE email = '$email' LIMIT 1")->fetch();
			//если есть выводим ошибку
			if($isNotUniqueEmail) 
			array_push($errMsg , "Пользователь с данной почтой уже зарегестрирован!");
		}

		echo "<br><strong>Количество ошибок валидации: " .count($errMsg) ."</strong><br>";
		if(count($errMsg)!==0){  echo "<ul>"; foreach ($errMsg as $key=>$value) echo "<li>".$value; echo "</ul>"; }
		

		if(count($errMsg)===0)
		{

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

			if($_SESSION['name_role']=="admin")  header('location: /admin/users/index.php');
			elseif($_SESSION['name_role']=="user") header('location: /');
				
		}		

	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$login = '';
		$email = '';
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-log'])){	

		$email = trim($_POST['email']);
		$user_password = trim($_POST['user_password']);
		//ВАЛИДАЦИЯ
		/*проверка заполнены ли поля...*/ 
			if( $email === '' || $user_password === '')
			array_push($errMsg, "Не все поля заполнены");	
			else{
				//запрашиваем данные о пользователе
				$userData = queryDB("SELECT users.id, users.username, users.user_password, roleVariants.name_role 
										FROM users 
										JOIN roleVariants ON users.user_role = roleVariants.id 
										WHERE email = '$email';
									")->fetch();
				//если пользователь есть и введеный пароль правильный
				if($userData && password_verify($user_password, $userData['user_password']))
					{
						$_SESSION['id'] = $userData['id'];
						$_SESSION['username'] = $userData['username'];
						$_SESSION['name_role'] = $userData['name_role'];
		
						if($userData['name_role']=="admin")  header('location: /admin/posts/index.php');
						elseif($userData['name_role']=="user") header('location: /');
					}
				else array_push($errMsg, "Данные пользователя введены неверно");
			}

	}else if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$login = '';
		$email = '';
	}
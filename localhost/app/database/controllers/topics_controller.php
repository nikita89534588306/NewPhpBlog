<?php
	$errMsg = '';
	$all_category = queryDB("SELECT * FROM category_posts;")->fetchAll();

	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])){

		//извлекаем данные из массива POST и отчищаем от пробелов
			$name_category = trim($_POST['name_category']);
			$description_category = trim($_POST['description_category']);


		//ВАЛИДАЦИЯ
		/*проверка заполнены ли поля...*/ 
		if( $name_category === ''/*|| $description_category === ''*/)
				$errMsg = "Введите имя категории";
		// проверяем имя категории - не короче 2х символов		
		else if(mb_strlen($name_category, 'UTF8') < 2)
			$errMsg = "Имя категории не может быть короче 2-х символов";
		else{
			//проверяем есть ли в БД данное имя категории
			$isNotUniqueСategory = queryDB("SELECT name_category FROM category_posts WHERE name_category = '$name_category' LIMIT 1")->fetch();
			//если есть выводим ошибку
			if($isNotUniqueСategory){
				$errMsg = "Данная категория уже существует";
			}
			else{
				//заносим в базу данных
				queryDB("
					INSERT INTO webPhp.category_posts (name_category,description_category)
					VALUES ( '$name_category', '$description_category');");  //добавляем пользователя в БД

				if($_SESSION['name_role']=="admin")  header('location: /admin/topic/index.php');
				elseif($_SESSION['name_role']=="user") header('location: /');
	
			}	
		}		

	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$name_category = '';
		$description_category = '';
	}

	//Редактирование категории
	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
		$id = $_GET['id'];
		$topic = queryDB("SELECT * FROM category_posts WHERE id = '$id'")->fetch();
		extract($topic);
	}
	else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){
		 printData($_POST);
		// die();
		//извлекаем данные из массива POST и отчищаем от пробелов
		$id = $_POST['id'];
		$name_category = trim($_POST['name_category']);
		$description_category = trim($_POST['description_category']);

		//ВАЛИДАЦИЯ
		/*проверка заполнены ли поля...*/ 
		if( $name_category === ''/*|| $description_category === ''*/)
			$errMsg = "Введите имя категории";
		// проверяем имя категории - не короче 2х символов		
		else if(mb_strlen($name_category, 'UTF8') < 2)
			$errMsg = "Имя категории не может быть короче 2-х символов";
		else{
			//проверяем есть ли в БД данное имя категории
			$isNotUniqueСategory = queryDB("SELECT name_category FROM category_posts WHERE name_category = '$name_category' LIMIT 1")->fetch();
			//если есть выводим ошибку
			if($isNotUniqueСategory){
				$errMsg = "Данная категория уже существует";
			}
			else{
				queryDB(
					"UPDATE category_posts 
						SET	name_category = '$name_category',
							description_category = '$description_category'
						WHERE id='$id';"
				);
				if($_SESSION['name_role']=="admin")  header('location: /admin/topic/index.php');
				elseif($_SESSION['name_role']=="user") header('location: /');
			}
		}
	}
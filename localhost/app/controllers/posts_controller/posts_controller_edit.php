<?php
//Редактирование категории
	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
		$id = $_GET['id'];
		$topic = queryDB("SELECT * FROM category_posts WHERE id = '$id'")->fetch();
		extract($topic);
	}
	else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){

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
				queryDB(
					"UPDATE category_posts 
						SET	name_category = '$name_category',
							description_category = '$description_category'
						WHERE id='$id';"
				);
				if($_SESSION['name_role']=="admin")  header('location: /admin/category/index.php');
				elseif($_SESSION['name_role']=="user") header('location: /');
			// }
		}
	}
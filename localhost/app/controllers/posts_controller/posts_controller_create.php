<?php

	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){

		$title = trim($_POST['title']);
		$content = trim($_POST['content']);
		$category = trim($_POST['category']);
		$img = trim($_POST['img']);


		if( $title === ''|| $content  === ''|| $category  === '')
			$errMsg = "Заголовок, текcт и категория статьи являются обязательными полями";	
		else if(mb_strlen($title, 'UTF8') < 2)
			$errMsg = "Заголовок не может быть короче 2-х символов";
		else{

			$user_id = $_SESSION['id'];
			queryDB("
				INSERT INTO webPhp.posts (user_id, title, img, content, id_category) 
					VALUES ('$user_id', '$title','$img', '$content', '$category') 
			"); 

			if($_SESSION['name_role']=="admin")  header('location: /admin/category/index.php');
			elseif($_SESSION['name_role']=="user") header('location: /');
		}		

	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$name_category = '';
		$description_category = '';
	}
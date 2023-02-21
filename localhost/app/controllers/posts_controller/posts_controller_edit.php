<?php
	$errMsg = [];
	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
		$id = $_GET['id'];
		$post = queryDB("SELECT * FROM posts WHERE id = '$id'")->fetch();
		extract($post);
		// printData($post);
	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
		$id = $_GET['pub_id'];
		$conditionPost = $_GET['publish'];
		queryDB("UPDATE webPhp.posts SET status_post = '$conditionPost' WHERE id='$id'; "); 
		if($_SESSION['name_role']=="admin")  header('location: /admin/posts/index.php');
		elseif($_SESSION['name_role']=="user") header('location: /');
	}
	else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post']))
	{
		// echo "<strong>Данные из массива POST </strong><br>";
		// printData($_POST);

		$id = trim($_POST['id']);
		$title = trim($_POST['title']);
		$content = trim($_POST['content']);
		$id_category = trim($_POST['id_category']);
		$status_post = (!empty($_POST['isPublished'])) ?  $_POST['isPublished'] : 0 ;

		//ВАЛИДАЦИЯ ДАННЫХ ИЗ МАССИВА ПОСТ
		if( $title === ''|| $content  === ''|| $id_category  === '')
			array_push($errMsg,"Заголовок, текcт и категория статьи являются обязательными полями");	
		else if(mb_strlen($title, 'UTF8') < 2)
			array_push($errMsg,"Заголовок не может быть короче 2-х символов");

		$img_post = $_FILES['img_post'];
		echo "<strong>Данные файла картинки </strong><br>";

		// printData($_FILES['img_post']);


		if(!empty($img_post['name'])&&!(strpos($img_post['type'], 'image')  !== false))
		 	array_push($errMsg, "Добавить можно только изображение");

		if(count($errMsg)===0)
		{
			$user_id = $_SESSION['id'];

			

			$imgName = (!empty($img_post['name'])) ? time()."_".$img_post['name'] : '';
			$fileTmpName = (!empty($img_post['name'])) ? $img_post['tmp_name'] : '';
			$destination = (!empty($img_post['name'])) ? "C:\ospanel\domains\localhost\app\img\posts\\".$imgName : '';
			if(!empty($img_post['name'])) $result = move_uploaded_file($fileTmpName, $destination);

			queryDB("
				UPDATE webPhp.posts
					SET 
						user_id = '$user_id', 
						title = '$title',
						content = '$content',  
						id_category = '$id_category', 
						status_post= '$status_post' 
					WHERE id='$id'; 
			"); 
			if($imgName !== '')
				queryDB("UPDATE webPhp.posts SET img = '$imgName' WHERE id='$id'; "); 	
			if($_SESSION['name_role']=="admin")  header('location: /admin/posts/index.php');
			elseif($_SESSION['name_role']=="user") header('location: /');
		}	

	}
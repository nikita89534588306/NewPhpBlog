<?php
	$errMsg = [];
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post']))
	{

		$title = trim($_POST['title']);
		$content = trim($_POST['content']);
		$category = trim($_POST['category']);


		if( $title === ''|| $content  === ''|| $category  === '')
			array_push($errMsg,"Заголовок, текcт и категория статьи являются обязательными полями");	
		else if(mb_strlen($title, 'UTF8') < 2)
			array_push($errMsg,"Заголовок не может быть короче 2-х символов");
		if($_FILES['img_post']['tmp_name'] !==''&&!(strpos($_FILES['img_post']['type'], 'image')  !== false))
			array_push($errMsg, "Добавить можно только изображение");

		if(count($errMsg)===0)
		{
			$user_id = $_SESSION['id'];
			$status = (!empty($_POST['isPublished'])) ?  $_POST['isPublished'] : 0 ;

			$imgName = (!empty($_FILES['img']['name'])) ? time()."_".$_FILES['img']['name'] : '';
			$fileTmpName = (!empty($_FILES['img']['name'])) ? $_FILES['img']['tmp_name'] : '';
			$destination = (!empty($_FILES['img']['name'])) ? "C:\ospanel\domains\localhost\app\img\posts\\".$imgName : '';
			if(!empty($_FILES['img']['name'])) $result = move_uploaded_file($fileTmpName, $destination);
			
			queryDB("
				INSERT INTO webPhp.posts (user_id, title, img, content, id_category, status_post) 
					VALUES ('$user_id', '$title','$imgName', '$content', '$category', '$status') 
			"); 

			if($_SESSION['name_role']=="admin")  header('location: /admin/posts/index.php');
			elseif($_SESSION['name_role']=="user") header('location: /');
		}		

	}
	else if($_SERVER['REQUEST_METHOD'] === 'GET')
	{

		$title = '';
		$content = '';
		$category = '';

	}
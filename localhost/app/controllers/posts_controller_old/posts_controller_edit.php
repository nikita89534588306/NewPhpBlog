<?php
$errMsg = [];


	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
		$id = $_GET['id'];
		$post = queryDB("SELECT * FROM posts WHERE id = '$id'")->fetch();
		extract($post);
	}
	else if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){

		$id = trim($_POST['id']);
		$title = trim($_POST['title']);
		$content = trim($_POST['content']);
		$id_category = trim($_POST['id_category']);
		$status_post = (!empty($_POST['isPublished'])) ?  $_POST['isPublished'] : 0 ;



		// if(isset($_FILES['img']['name'])){
			
		// }

		// // $imgName = (!empty($_FILES['img']['name'])) ? time()."_".$_FILES['img']['name'] : '';
		// // $fileTmpName = (!empty($_FILES['img']['name'])) ? $_FILES['img']['tmp_name'] : '';
		// // $fileType =  (!empty($_FILES['img']['name'])) ? $_FILES['img']['type'] : '';
		// // $destination = (!empty($_FILES['img']['name'])) ? "C:\ospanel\domains\localhost\app\img\posts\\".$imgName : '';


		if( $title === ''|| $content  === ''|| $id_category  === '')
			array_push($errMsg,"Заголовок, текcт и категория статьи являются обязательными полями");	
		else if(mb_strlen($title, 'UTF8') < 2)
			array_push($errMsg,"Заголовок не может быть короче 2-х символов");

		// // $fileTmpName = (!empty($_FILES['img']['name'])) ? $_FILES['img']['tmp_name'] : '';
		// // $fileType =  (!empty($_FILES['img']['name'])) ? $_FILES['img']['type'] : '';
		// if($fileTmpName!==''&&!(strpos($fileType, 'image')  !== false))
		// 	array_push($errMsg, "Добавить можно только изображение");

		if(count($errMsg)===0)
		{
			$user_id = $_SESSION['id'];

			if(!empty($_FILES['img']['name'])) $result = move_uploaded_file($fileTmpName, $destination);

			queryDB("
				UPDATE webPhp.posts
					SET 
						user_id = '$user_id', 
						title = '$title',
						img = '$imgName', 
						content = '$content',  
						id_category = '$id_category', 
						status_post= '$status_post' 
					WHERE id='$id'; 
			"); 
			if($_SESSION['name_role']=="admin")  header('location: /admin/posts/index.php');
			elseif($_SESSION['name_role']=="user") header('location: /');
		}	
	}
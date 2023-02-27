<?php

	$posts_for_carusel = queryDB(

		"SELECT 
			posts.id AS id,
			users.username AS username,
			posts.title AS title,
			posts.img AS img,
			posts.content AS content,
			posts.status_post AS status_post,
			posts.id_category AS id_categoty,
			posts.deleted_at AS deleted_at,
			posts.created_at AS created_at
		FROM posts
		JOIN users ON posts.user_id = users.id
		WHERE deleted_at=0
		ORDER BY posts.id DESC
		LIMIT 3;"

	)->fetchAll();


	if($_SERVER['REQUEST_METHOD'] === "GET"){
		
		$id_categoty = (isset($_GET['category']))? $_GET['category'] : '';
		$findText = (isset($_GET['findPost'])) ? trim($_GET['findPost']) : ''; 
		$sql = "SELECT COUNT(posts.id) AS 'value' FROM posts WHERE deleted_at=0";

		if(isset($_GET['category'])) $sql = $sql . " AND posts.id_category='$id_categoty'";
		if(isset($_GET['findPost']))  $sql = $sql . " AND (posts.title LIKE '%$findText%' OR  posts.content LIKE '%$findText%')";

		$totalValue_posts = queryDB($sql)->fetchColumn();
		$maxPostOnPage = 3;
		$total_pages = ceil($totalValue_posts/$maxPostOnPage);
		if(isset($_GET['page'])){
			$getPage = $_GET['page'];
			if($getPage>$total_pages) $getPage = $total_pages;
		}
		else{
			$getPage = 1;
		}
		$offset = ($getPage-1)*$maxPostOnPage;
	

		$sql = "SELECT 
					posts.id AS id,
					users.username AS username,
					posts.title AS title,
					posts.img AS img,
					posts.content AS content,
					posts.status_post AS status_post,
					posts.id_category AS id_categoty,
					posts.deleted_at AS deleted_at,
					posts.created_at AS created_at
				FROM posts
				JOIN users ON posts.user_id = users.id
				WHERE deleted_at=0";
		if(isset($_GET['category'])) $sql = $sql . " AND posts.id_category='$id_categoty'";
		if(isset($_GET['findPost']))  $sql = $sql . " AND (posts.title LIKE '%$findText%' OR  posts.content LIKE '%$findText%')";
		$sql = $sql . " LIMIT $maxPostOnPage OFFSET $offset ;";
		$all_posts = queryDB($sql)->fetchAll();
	
	}



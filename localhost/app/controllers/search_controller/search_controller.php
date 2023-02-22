<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['findPost'])){
		$text = trim($_POST['findPost']);

		$all_posts = queryDB(
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
			AND posts.title LIKE '%$text%' 
			OR  posts.content LIKE '%$text%' ")->fetchAll();
		
	}
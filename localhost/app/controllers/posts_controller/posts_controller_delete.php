<?php

	if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
		$id = $_GET['del_id'];
		// printData($id);
		// die();
		queryDB(
			"UPDATE posts 
				SET	deleted_at = 1
				WHERE id='$id';"
		);
		if($_SESSION['name_role']=="admin")  header('location: /admin/posts/index.php');
		elseif($_SESSION['name_role']=="user") header('location: /');
	}	
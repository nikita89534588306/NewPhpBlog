<?php 
	include '../session.php';
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['name_role']);
	header('location: /');
	var_dump($_SESSION);
	die();
	echo "asdas";
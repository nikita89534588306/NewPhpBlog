<?php 
	$driver = "mysql";		//имя СУБД
	$host = 'localhost';	//хост
	$port = "4000";
	$db_name = 'webPhp';
	$db_user = 'root';
	$db_pass = '';
	$charset = 'utf8';
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				//опция которая говорит что мы при запросе работаем только с ассоциативным массивом
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

	try{
		$pdo = new PDO(
			"$driver:host=$host;port=$port;dbname=$db_name;charset=$charset",
			$db_user,
			$db_pass,
			$options
		);
		// echo "DB connect";
	}catch(PDOException $i){
		die($i);
	};

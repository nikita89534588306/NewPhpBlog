<?php 

	function printData($value){
		echo "<pre>";
		print_r($value);
		echo "</pre>";
	}
	function queryDB($sql){
		global $pdo;
		$query = $pdo->prepare($sql);		//подготавлеваем запрос для защиты от SQL инжекции
		$query->execute();					//выполнить данный запрос
		$errInfo = $query->errorInfo();		//получаем ошибки если таковые имеются
		
		//если есть ошибкт
		if($errInfo[0]!==PDO::ERR_NONE){
			//то выводим сообщение об ошибке
			echo $errInfo[2];
			//прерываем выполнение кода
			exit();
		}
		return $query; //возвращаем запрос
	}

	$data = queryDB("SELECT * FROM testTable WHERE txt='Samsung'")->fetchAll(); 
	printData($data);

	
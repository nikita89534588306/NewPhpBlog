<?php
	include './app/database/session.php';
	include './app/database/connect.php';
	include './app/database/db.php';
	include './app/database/controllers/users.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./app/templates/head.php" ?>
</head>
<body>
    <?php include "./app/templates/header.php" ?>
	<?php if($_SESSION['name_role'] == 'admin'):?>	
		Админ панель
	<?php else: ?>
		Иди нахуй
	<?php endif?>
	
    <?php include "./app/templates/footer.php" ?>
</body>
</html>
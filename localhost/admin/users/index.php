<?php
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/controllers/users.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT']."/app/templates/head.php" ?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/app/templates/header.php" ?>

	<main class="admin">
		<?php if($_SESSION['name_role'] == 'admin'):?>	
			<div class="container" >
				<div class="row my-3">
					<?php 
						include $_SERVER['DOCUMENT_ROOT']."/app/templates/admin/navbar/navbar.php";
						echo sidebar('users');
					 ?>

					<div class="posts col-12 col-md-7">

						<div class="h3 text-center">Управление пользователями</div>
						<div class="row title-table ">
							<div class="id col-1 text-center">ID</div>
							<div class="title col-4 text-center">Логин</div>
							<div class="author col-2 text-center">Роль</div>
							<div class="action col-5 text-center">Редактировать</div>
						</div>

						<div class="row post">
							<div class="id col-1 text-center">1</div>
							<div class="title col-4 text-center">Дядя Вася</div>
							<div class="author col-2 text-center">Админ</div>
							<div class=" col-5 text-center d-flex  justify-content-around">
								<div class="d-inline red text-center "><a style="color:darkturquoise" href="">edit</a></div>
								<div class="d-inline del text-center "><a style="color:red" href="">delete</a></div>
							</div>

						</div>
					</div>
					
				</div>
			</div>

		<?php else: ?>
			Отказано в доступе
		<?php endif?>
	</main>

    <?php include $_SERVER['DOCUMENT_ROOT']."/app/templates/footer.php" ?>
</body>
</html>
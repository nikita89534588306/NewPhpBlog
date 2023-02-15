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

	<main class="admin">
		<?php if($_SESSION['name_role'] == 'admin'):?>	
			<div class="container" >
				<div class="row my-3">
					<div class="sidebarUser col-12 col-md-3 mb-2 mb-sm-0 me-5">
						<ul >
							<li><a href="#">Записи</a></li>
							<li><a href="#">Пользователи</a></li>
							<li><a href="#">Категории</a></li>
						</ul>
					</div>
					<div class="posts col-12 col-md-7">
						<div class="button row">
							<a href="" class="col-12 btn btn-success mb-2">add post</a>
							<a href="" class="col-12 btn btn-primary mb-2">manage post</a>
						</div>
						<div class="h3 text-center">Управление записями</div>
						<div class="row title-table ">
							<div class="id col-1 text-center">ID</div>
							<div class="title col-4 text-center">Название</div>
							<div class="author col-2 text-center">Автор</div>
							<div class="action col-5 text-center">Редактировать</div>
						</div>

						<div class="row post">
							<div class="id col-1 text-center">1</div>
							<div class="title col-4 text-center">Какая то там статья</div>
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

    <?php include "./app/templates/footer.php" ?>
</body>
</html>
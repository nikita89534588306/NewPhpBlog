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
					<div class="sidebarUser col-12 col-md-3 mb-2 mb-sm-0 me-5">
						<ul >
							<li><a href="#">Записи</a></li>
							<li><a href="#">Пользователи</a></li>
							<li><a href="#">Категории</a></li>
						</ul>
					</div>
					<div class="posts col-12 col-md-7">
						<div class="button row">
							<a href="" class="col-12 btn btn-success mb-2 disabled" aria-disabled="true">Создать категорию</a>
							<a href="" class="col-12 btn btn-primary mb-2">Редактировать категорию</a>
						</div>
						<div class="h3 text-center mt-3 mb-0">Создать категорию</div>

						<div class="row add-post mt-1">
							<form class="p-0">
								<div class="mb-2">
									<label for="categoty-name" class="form-label ps-2">Имя категории</label>
									<input type="text" class="form-control" id="categoty-post">
								</div>
								<div class="mb-2">
									<label for="categoty-description" class="form-label ps-2">Описание категории</label>
									<textarea class="form-control" id="categoty-description" rows="6" ></textarea>
								</div>

								<div class='d-flex justify-content-center mt-4 mb-3'>
									<button type="button" style="width: 33%;" class="btn btn-warning">Создать категорию</button>
								</div>
							</form>
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
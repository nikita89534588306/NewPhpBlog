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
						echo sidebar('posts');
					 ?>
					<!-- <div class="sidebarUser col-12 col-md-3 mb-2 mb-sm-0 me-5">
						<ul >
							<li><a href="#">Записи</a></li>
							<li><a href="#">Пользователи</a></li>
							<li><a href="#">Категории</a></li>
						</ul>
					</div> -->
					<div class="posts col-12 col-md-7">

						<div class="h3 text-center mt-3 mb-0">Добавить статью</div>

						<div class="row add-post mt-1">
							<form class="p-0">
								<div class="mb-2">
									<label for="title-post" class="form-label ps-2">Название статьи</label>
									<input type="text" class="form-control" id="title-post" placeholder="Заголовок">
								</div>
								<style>
									.ck-editor__editable_inline {
										height: 200px;
										overflow: scroll;
									}
								</style>
								<div class="mb-2">
									<label for="editor" class="form-label ps-2">Текст статьи</label>
									<textarea class="form-control"  id="editor" rows="6" placeholder="Ваш текст..."></textarea>
								</div>
								<div class="mb-2">
									<label for="formFile" class="form-label  ps-2"">Добавить файл</label>
									<input class="form-control" type="file" id="formFile">
								</div>
								
								<div class="mb-2">	
									<label class="form-label ps-2">Выбрать категорию </label>
									<select class="form-select" aria-label="Default select example">
										<option selected>Open this select menu</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select>
								</div>
								<div class='d-flex justify-content-center mt-4 mb-3'>
									<button type="button" style="width: 33%;" class="btn btn-warning">Опубликовать</button>
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
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
	<script src='/app/js/script.js'></script>
</body>
</html>
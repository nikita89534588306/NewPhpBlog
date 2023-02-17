<?php
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/posts_controller/posts_controller_create.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/category_controller/category_controller_index.php';
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

					<div class="posts col-12 col-md-7">

						<div class="h3 text-center mt-3 mb-0">Добавить статью</div>

						<div class="row add-post mt-1">
							<form class="p-0" method="post" action="/admin/posts/create.php">
								<div class="mb-2">
									<label for="title-post" class="form-label ps-2">Название статьи</label>
									<input name="title" type="text" class="form-control" id="title-post" placeholder="Заголовок">
								</div>
								<style>
									.ck-editor__editable_inline {
										height: 200px;
										overflow: scroll;
									}
								</style>
								<div class="mb-2">
									<label for="editor" class="form-label ps-2">Текст статьи</label>
									<textarea name="content" class="form-control"  id="editor" rows="6" placeholder="Ваш текст..."></textarea>
								</div>
								<div class="mb-2">
									<label for="formFile" class="form-label  ps-2"">Добавить файл</label>
									<input name="img" class="form-control" type="file" id="formFile">
								</div>
								
								<div class="mb-2">	
									<label class="form-label ps-2">Выбрать категорию </label>
									<select name="category" class="form-select" aria-label="Default select example">
									<!-- <option selected>Выберете категорию</option> -->
									<?php foreach($all_category as $number => $categoty) : ?>
										
										<option value="<?=$categoty['id']?>"><?=$categoty['name_category']?></option>
									<?php endforeach?>
									</select>
								</div>
								<div class='d-flex justify-content-center mt-4 mb-3'>
									<button type="submit" style="width: 33%;" name="add_post" class="btn btn-warning">Добавить запись</button>
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
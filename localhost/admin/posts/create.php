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

	<main class="admin px-3 px-sm-0">
		<?php if($_SESSION['name_role'] == 'admin'):?>	
			<div class="container" >
				<div class="row my-3 justify-content-center">
					<?php 
						include $_SERVER['DOCUMENT_ROOT']."/app/templates/admin/navbar/navbar.php";
						echo sidebar('posts');
					?>

					<div class="posts p-0 col-12 col-md-7">

					<div class="h3 text-center mt-3 mb-0">Добавить статью</div>
						<?php include $_SERVER['DOCUMENT_ROOT'].'/app/helps/errInfo.php' ?>
						<form class="row add-post mt-1 p-0" method="post" action="/admin/posts/create.php" enctype="multipart/form-data">
							<div class="mb-2">
								<label for="title-post" class="form-label ps-2">Название статьи</label>
								<input name="title" type="text" value="<?=$title?>" class="form-control" id="title-post" placeholder="Заголовок">
							</div>
							<style>
								.ck-editor__editable_inline {
									height: 200px;
									overflow: scroll;
								}
							</style>
							<div class="mb-2">
								<label for="editor" class="form-label ps-2">Текст статьи</label>
								<textarea name="content" class="form-control"  id="editor" rows="6" placeholder="Ваш текст..."><?=$content?></textarea>
							</div>
							<div class="mb-2">
								<label for="formFile" class="form-label  ps-2"">Добавить файл</label>
								<input name="img" class="form-control" type="file" id="formFile">
							</div>
							
							<div class="me-2 mt-3 row ">	
								<div class="col-7 d-flex align-items-center">
									<label style="margin: 0 10px 0 0"class="form-label p-0 ">Категория:  </label>
									<select name="category" class=" form-select" aria-label="Default select example">
									<!-- <option selected>Выберете категорию</option> -->
									<?php foreach($all_category as $number => $categoty) : ?>
										<option value="<?=$categoty['id']?>" <?php if(isset($_POST['category'])&&($categoty['id']==$_POST['category'])) echo "selected"?>><?=$categoty['name_category']?></option>
									<?php endforeach?>
									</select>
								</div>
								<div class="col-5 d-flex align-items-center justify-content-center">
									<input style="margin: 0 5px 0 0" class="form-check-input " type="checkbox" name='isPublished' value="1" id="flexCheckDefault" checked>
									<label class="form-check-label" for="flexCheckDefault">
										Опубликовать
									</label>
								</div>
							</div>

							<div class='d-flex justify-content-center mt-4 mb-3'>
								<button type="submit" style="width: 33%;" name="add_post" class="btn btn-warning">Добавить запись</button>
							</div>

						</form>
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
<?php
	$errMsg = '';
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/category_controller/category_controller_create.php';
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
						echo sidebar('topic');
					 ?>

					<div class="posts col-12 col-md-7 p-0">
	
						<div class="h3 text-center mt-3 mb-0">Создать категорию</div>
						<?php if($errMsg !== '')
							echo '<div class="messege-error alert alert-danger mt-3" role="alert">'.$errMsg.'</div>'
						?>
						<div class="row  add-post mt-1">
							<form style="padding: 0  13px;"   class=" col-12" method="post" action="/admin/category/create.php">
								<div class="mb-2">
									<label for="categoty-name" class="form-label ps-2">Имя категории</label>
									<input type="text" value="<?=$name_category?>" name="name_category" class="form-control" id="categoty-post">
								</div>
								<div class="mb-2">
									<label for="categoty-description" class="form-label ps-2">Описание категории</label>
									<textarea class="form-control" name="description_category" id="categoty-description" rows="6" ><?=$description_category?></textarea>
								</div>

								<div class='d-flex justify-content-center mt-4 mb-3'>
									<button type="submit" name='topic-create' value='1' style="width: 33%;" class="btn btn-warning">Создать категорию</button>
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
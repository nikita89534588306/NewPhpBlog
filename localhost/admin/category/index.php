<?php
	$errMsg = '';
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/category_controller/category_controller_index.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/category_controller/category_controller_delete.php';
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
					
					<div class="posts col-12 col-md-7">
						<div class="row">

							<div class="h3 col-9 text-center">Управление категориями</div>

						</div>
						<div class="row title-table ">
							<div class="id col-2 text-center">ID</div>
							<div class="title col-5 text-center">Название</div>
							<div class="action col-5 text-center">Редактировать</div>
						</div>
						<?php foreach($all_category as $key => $topic):?>
							<div class="row post">
								<div class="id col-2 text-center"><?=$key + 1;?></div>
								<div class="title col-5 text-center"><?=$topic['name_category'];?></div>
								<div class=" col-5 text-center d-flex  justify-content-around">
									<div class="d-inline red text-center "><a style="color:darkturquoise" href="edit.php?id=<?=$topic['id']?>">edit</a></div>
									<div class="d-inline del text-center "><a style="color:red" href="./index.php?del_id=<?=$topic['id']?>">delete</a></div>
								</div>
							</div>
						<?php endforeach; ?>
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
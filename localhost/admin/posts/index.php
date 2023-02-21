<?php
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/posts_controller/posts_controller_index.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/posts_controller/posts_controller_delete.php';
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
	
						<div class="h3 text-center">Управление статьями</div>
						<div class="row title-table ">
							<div class="id col-1 text-center">ID</div>
							<div class="title col-4 text-center">Название</div>
							<div class="author col-2 text-center">Автор</div>
							<div class="action col-5 text-center">Редактировать</div>
						</div>

						<?php foreach($all_posts as $key => $post):?>
							<div class="row post flex-nowrap">
								<div class="id col-1 text-center"><?=$key + 1;?></div>
								<div class="title col-4 text-center"><?=$post['title'];?></div>
								<div class="author col-2 text-center"><?=$post['username'];?></div>
								<div class=" col-5 text-center d-sm-flex  justify-content-around">
									<div class="p-1 p-md-2 d-sm-inline red text-center "><a style="color:darkturquoise" href="edit.php?id=<?=$post['id']?>">edit</a></div>
									<div class="p-1 p-md-2 d-sm-inline del text-center "><a style="color:red" href="./index.php?del_id=<?=$post['id']?>">delete</a></div>
									<?php if($post['status_post']==1) {
										echo '<div class="p-1 p-md-2 d-sm-inline stat text-center "><a style="color:blue" href="./edit.php?publish=0&pub_id='.$post['id'].'">publish</a></div>';
									} else echo '<div class="p-1 p-md-2 d-sm-inline stat text-center "><a style="color:black" href="./edit.php?publish=1&pub_id='.$post['id'].'">hidden</a></div>';?>
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
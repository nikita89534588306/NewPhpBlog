<?php
	include './app/database/session.php';
	include './app/database/connect.php';
	include './app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/category_controller/category_controller_index.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/search_controller/search_controller.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./app/templates/head.php" ?>
</head>
<body>
    <?php include "./app/templates/header.php" ?>
	<main style="min-height: 1700px;"class="container ">

			<div class="last-posts row" >
				<h2 class="header">Результаты поиска</h2>
				<div class="content row justify-content-center">
					
						<form class="findPost_index w-75 row justify-content-end" method="post" action="/app/controllers/search_controller/search.php">
								
							<label style="text-align: right;" for="finder" class="col-12 col-sm-4 text-center text-sm-right py-1 m-0">Найти запись: </label>
							<input type="text"  class="search col-12 col-sm-7"  name="findPost"  id="finder" placeholder="Поиск...">
								
						</form>


						
						<div class="posts w-75">
							<?php foreach($all_posts as $key => $post) : ?>
								<?if($post['status_post']):?>
								<div class="post-card ">
									<div class="img">
										<img  src="./app/img/<?php if($post['img']!== '') echo 'posts/'.$post['img']; else echo "imgNotFound.png"?>" 
											alr='...' 
											>
									</div>
									<div class="content">
										<h3 class='title'>
											<a href='/single_post.php?id_post=<?=$post['id']?>'>
												<?=$post['title']?>
											</a>
										</h3>
										<i class='name-author fa fa-user'><?=$post["username"]?></i>
										<i class='data-post fa fa-calendar'><?=$post["created_at"]?></i>
										<div class="text">
											<div style="display:inline-block" class='preview-text'>
												<?=$post['content']?>
											</div>
										</div>
									</div>
								</div>
								<?php endif;?>
							<?php endforeach;?>

						</div>
				</div>
			</div>
			


	</main>
    <?php include "./app/templates/footer.php" ?>
</body>
</html>
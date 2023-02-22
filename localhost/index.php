<?php
	include './app/database/session.php';
	include './app/database/connect.php';
	include './app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/category_controller/category_controller_index.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/posts_controller/posts_controller_index.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./app/templates/head.php" ?>
</head>
<body>
    <?php include "./app/templates/header.php" ?>
	<main style="min-height: 1700px;"class="container ">

			<div class="topPost" >
				<div class="row">
					<h2 class=" topPost-sliderTitle">
						Последние публикации
					</h2>
				</div>
				<div id="carouselExampleCaptions" class="topPost-carousel carousel slide">
					<div class="carousel-inner">
						<?php $lastPosts = $last_post ?>
						<?php for($numberPost=0;$numberPost<count($lastPosts);$numberPost++) : ?>
							<div class="carousel-item <?php if($numberPost==0) echo "active"; ?>">
								<img src="./app/img/<?php if($lastPosts[$numberPost]['img']!== '') echo 'posts/'.$lastPosts[$numberPost]['img']; else echo "imgNotFound.png";?>" 
								class="d-block img-fluid"  alt="...">

								<div style="background-color: black; right:0; left:0;opacity:0.8;"class="carousel-caption d-flex justify-content-center">
									<div class="">
										<h1 style="opacity:1;"><?=$lastPosts[$numberPost]['title']?></h1>
										<p>Some representative placeholder content for the first slide.</p>
									</div>
								</div>
							</div>
						<?endfor;?>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>
			</div>
			
			<div class="last-posts con" >
				<h2 class="header">Публикации</h2>
				<div class="content">

					<form class="findPost_index adaptiv" method="post" action="/index.php">
							
						<label for="finder" class=" ">Найти запись: </label>
						<input type="text"  class="search py-1"  name="findPost"  id="finder" placeholder="Поиск...">
							
					</form>
					<!--  -->
					<div class="topic sidebar">
						
						<h3 class='topic-header'>Категории</h3>
						<div class='list'>
							<?php foreach($all_category as $key => $value): ?>
								<div ><a class='list-item fs-5'href='#'><?=$value['name_category']?></a></div>
							<?php endforeach; ?>
						</div>
					</div>

					
					<div class="posts">
						<?php foreach($all_posts as $key => $post) : ?>
							<?if($post['status_post']):?>
							<div class="post-card">
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
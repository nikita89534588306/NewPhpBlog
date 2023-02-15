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
	<main class="container">

			<div class="topPost" >
				<div class="row">
					<h2 class=" topPost-sliderTitle">
						Топ публикации
					</h2>
				</div>
				<div id="carouselExampleCaptions" class="topPost-carousel carousel slide">
					<div class="carousel-inner">
						<div class="carousel-item active ">
							<img src="./app/img/1645469031_35-sportishka-com-p-zimnii-baikal-turizm-krasivo-foto-35.jpg" 
								class="d-block img-fluid"  alt="..."
							>
							<div class="carousel-caption d-block">
								<h5>First slide label</h5>
								<p>Some representative placeholder content for the first slide.</p>
							</div>
						</div>
						<div class="carousel-item" >
							<img src="./app/img/1670662446_44-almode-ru-p-samii-krasivii-makiyazh-na-novii-god-45.jpg" 
								class="d-block " alt="..." >
							<div class="carousel-caption  d-block">
								<h5>Second slide label</h5>
								<p>Some representative placeholder content for the second slide.</p>
							</div>
							</div>
						<div class="carousel-item">
							<img src="./app/img/water-cafe.jpg" 
							class="d-block " alt="..." >
							<div class="carousel-caption  d-block">
								<h5>Third slide label</h5>
								<p>Some representative placeholder content for the third slide.</p>
							</div>
						</div>
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
				<h2 class="header">Последние публикации</h2>
				<div class="content">
					<div class="topic sidebar">
						<h3 class='topic-header'>Категории</h3>
						<div class='list'>
							<div><a class='list-item'href='#'>Программирование</a></div>
							<div><a class='list-item'href='#'>Дизайн</a></div>
							<div><a class='list-item'href='#'>Визуализация</a></div>
							<div><a class='list-item'href='#'>Кейсы</a></div>
							<div><a class='list-item'href='#'>Мотивация</a></div>

						</div>
					</div>
					<div class="posts">
						<div class="post-card">
							<div class="img">
								<img  src="./app/img/1645469031_35-sportishka-com-p-zimnii-baikal-turizm-krasivo-foto-35.jpg" 
									alr='...' 
									>
							</div>
							<div class="content">
								<h3 class='title'>
									<a href='/single.php'>
										Траливалт бблабалабла авоывомлжва
									</a>
								</h3>
								
								<i class='name-author fa fa-user'>Имя автора</i>
								<i class='data-post fa fa-calendar'>May 21, 2022</i>
								<div class="text">
									<p class='preview-text'>
										Lorem ipsum dolor sit, amet consectetur 
										adipisicing elit. Ut iure maxime blanditiis et, repellendus 
										possimus voluptas eaque eligendi itaque cum!
									</p>
								</div>
								
							</div>
						</div>
						
						<div class="post-card">
							<div class="img">
								<img  src="./app/img/1670662446_44-almode-ru-p-samii-krasivii-makiyazh-na-novii-god-45.jpg" " 
									alr='...' 
									>
							</div>
							<div class="content">
								<h3 class='title'>
									<a href='/single.php'>
										Траливалт бблабалабла авоывомлжва
									</a>
								</h3>
								
								<i class='name-author fa fa-user'>Имя автора</i>
								<i class='data-post fa fa-calendar'>May 21, 2022</i>
								<div class="text">
									<p class='preview-text'>
										Lorem ipsum dolor sit, amet consectetur 
										adipisicing elit. Ut iure maxime blanditiis et, repellendus 
										possimus voluptas eaque eligendi itaque cum!
									</p>
								</div>
							</div>	
						</div>

						<div class="post-card">
							<div class="img">
								<img  src="./app/img/water-cafe.jpg""
									alr='...' 
									>
							</div>
							<div class="content">
								<h3 class='title'>
									<a href='/single.php'>
										Траливалт бблабалабла авоывомлжва
									</a>
								</h3>
								
								<i class='name-author fa fa-user'>Имя автора</i>
								<i class='data-post fa fa-calendar'>May 21, 2022</i>
								<div class="text">
									<p class='preview-text'>
										Lorem ipsum dolor sit, amet consectetur 
										adipisicing elit. Ut iure maxime blanditiis et, repellendus 
										possimus voluptas eaque eligendi itaque cum!
									</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			


	</main>
    <?php include "./app/templates/footer.php" ?>
</body>
</html>
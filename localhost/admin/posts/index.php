<?php
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/posts_controller/posts_controller_index.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/posts_controller/posts_controller_delete.php';

?>
	<?php 	

	$maxSizePages = 2;
	if($maxSizePages>$total_pages) $maxSizePages = $total_pages;
	$offsetPages = $getPage - $maxSizePages;
	$nubmerfirstPage = ($maxSizePages > $getPage  ) ? 1 : 1 + $offsetPages;
	$nubmerlastPage = ($getPage> $maxSizePages) ? $getPage : $maxSizePages ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT']."/app/templates/head.php" ?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/app/templates/header.php" ?>

	<main style="min-height: 900px;"class="admin">
		<?php if($_SESSION['name_role'] == 'admin'):?>	
			<div class="container" >
				<div class="row my-3">
					<?php 
						include $_SERVER['DOCUMENT_ROOT']."/app/templates/admin/navbar/navbar.php";
						echo sidebar('posts');
					?>
					<div class="posts col-12 col-md-7">
						
						<div class="h3  text-center mt-3">Управление статьями</div>
						<div class="row justify-content-end mb-2">
						<nav class="col-7 d-flex align-items-center"aria-label="Page navigation example">
								<ul class="pagination m-0">

										<?php if($getPage >1) : ?> 
										<li class="page-item">
											<a class="page-link" href="/admin/posts/index.php?page=<?=$getPage-1?><?php if(isset($_GET['showValuePost'])) echo "&showValuePost=".$_GET['showValuePost']?>" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
										<?php else: ?>
											<li class="page-item disabled">
											<a class="page-link" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
										<?php endif; ?> 
									
									
										<?php for($numberPage=$nubmerfirstPage; $numberPage<=$nubmerlastPage; $numberPage++):?>
											<li class="page-item <?php if($numberPage==$getPage) echo "active"?>"><a class="page-link" 
											href="/admin/posts/index.php?page=<?=$numberPage?><?php if(isset($_GET['showValuePost'])) echo "&showValuePost=".$_GET['showValuePost']?>"><?=$numberPage?></a></li>
										<?php endfor;?>
										<?php if($getPage == $total_pages) : ?> 
											<li class="page-item disabled">
												<a class="page-link"  aria-label="Next">
													<span aria-hidden="true">&raquo;</span>
												</a>
											</li>
										<?php else: ?>
											<li class="page-item">
												<a class="page-link" href="/admin/posts/index.php?page=<?=$getPage+1?><?php if(isset($_GET['showValuePost'])) echo "&showValuePost=".$_GET['showValuePost']?>" aria-label="Next">
												<span aria-hidden="true">&raquo;</span></a>
											</li>
										
										<?php endif; ?> 
								</ul>
							</nav>
							<div class="col-3 text-end d-flex justify-content-end p-0 align-items-center" >Кол-во записей : </div>
							<form class="col-2 d-flex align-items-center" id="valuePostsForm" method="get" action="/admin/posts/index.php">
								<select  name='showValuePost' onchange="document.getElementById('valuePostsForm').submit()" class="form-select" aria-label="Default select example">
									<option <?php if(isset($_GET['showValuePost'])&&$_GET['showValuePost']=="3") echo "selected"?> value="3">3</option>
									<option <?php if(isset($_GET['showValuePost'])&&$_GET['showValuePost']=="5") echo "selected"?> value="5">5</option>
									<option <?php if(isset($_GET['showValuePost'])&&$_GET['showValuePost']=="10") echo "selected"?> value="10">10</option>
								</select>
								
							</form>
							
						</div>
						<div class="row title-table ">
							<div class="id col-1 text-center">ID</div>
							<div class="title col-4 text-center">Название</div>
							<div class="author col-2 text-center">Автор</div>
							<div class="action col-5 text-center">Редактировать</div>
						</div>

						<?php foreach($all_posts as $key => $post):?>
							<div class="row post flex-nowrap">
								<div class="id col-1 text-center"><?=($key + 1) + (($getPage-1)*$maxPostOnPage);?></div>
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
<?php
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/posts_controller/posts_controller_edit.php';
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

					<div class="h3 text-center mt-3 mb-0">Редактирование статьи</div>
						<?php include $_SERVER['DOCUMENT_ROOT'].'/app/helps/errInfo.php' ?>
						<form class="row add-post mt-1 p-0" method="post" action="/admin/posts/edit.php" enctype="multipart/form-data">
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
							<div style="width: 200px;height: 200px; border: 1px solid silver; overflow:hidden;" class='mb-3 addImg'>
									<img style="opacity: 1; object-fit: contain; width: 200px;height: 200px;" class="previewImg" 
									src='<?php if(isset($img)&&$img!=="") echo "/app/img/posts/".$img; else echo '/app/img/imgNotFound.png'?>'; alt=''></img>
								</div>
								<!-- <label for="formFile" class="form-label  ps-2">Добавить файл</label> -->
								<input name="img_post"   class="inputImg" type="file" id="formFile">
							</div>
							
							<div class="me-2 mt-3 row ">	
								<div class="col-7 d-flex align-items-center">
									<input name="id" value="<?=$id?>" type="hidden" >
									<label style="margin: 0 10px 0 0"class="form-label p-0 ">Категория:  </label>
									<select name="id_category" class=" form-select" aria-label="Default select example">
									<?php foreach($all_category as $number => $thisCategoty) : ?>
										<option value="<?=$thisCategoty['id']?>" <?php if(($thisCategoty['id']==$id_category)) echo "selected"?>><?=$thisCategoty['name_category']?></option>
									<?php endforeach?>
									</select>
								</div>
								<div class="col-5 d-flex align-items-center justify-content-center">
									<?php if($status_post == 1) : ?> 
										<input style="margin: 0 5px 0 0" class="form-check-input " type="checkbox" name='isPublished' value="1" id="flexCheckDefault" checked>
									<?php else : ?> 
										<input style="margin: 0 5px 0 0" class="form-check-input " type="checkbox" name='isPublished' value="1" id="flexCheckDefault" >
									<?php endif ?>
									<label class="form-check-label" for="flexCheckDefault">
										Опубликовать
									</label>
								</div>
							</div>

							<div class='d-flex justify-content-center mt-4 mb-3'>
								<button type="submit" style="width: 33%;" name="edit_post" class="btn btn-warning">Сохранить запись</button>
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
	<script>
		let inputFile = document.querySelector('.inputImg')
		let addImg = document.querySelector('.addImg')
		let imgInput = document.querySelector('.previewImg')
		addImg.addEventListener('click',function ()  {
				inputFile.click();
		})
			inputFile.addEventListener("change",  function () {
				console.log("change")
				let selectedImage = inputFile.files[0];
				console.log(inputFile.files[0])
				if( selectedImage !== undefined){
					const fileReader = new FileReader()
					fileReader.readAsDataURL(selectedImage)
					fileReader.addEventListener("load", function(){
						imgInput.style["opacity"] = "1";
						imgInput.src = this.result;
					}, false);
				}	
			})
	</script>
</body>
</html>
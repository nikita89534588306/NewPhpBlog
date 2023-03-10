<?php
	include $_SERVER['DOCUMENT_ROOT']."/app/database/session.php";
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/database/db.php';
	include $_SERVER['DOCUMENT_ROOT'].'/app/controllers/users.php';

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
						echo sidebar('users');
					 ?>

					
					<div class="posts col-12 col-md-7">

						<div class="h3 text-center mt-3 mb-0">Добавление пользователя</div>

						<div class="row add-post mt-1">
							<form class="p-0" method="post" action="/admin/users/create.php" >
								
								<div class="mb-3">
									<label for="loginReg" class="form-label ps-2">Ваш логин</label>
									<input name="login" value="<?=$login?>" type="text" class="form-control" id="loginReg" >
								</div>

								<div class="mb-3">
									<label for="emailAuth" class="form-label ps-2">Email адрес</label>
									<input name="email" value="<?=$email?>" type="email" class="form-control" id="emailAuth" >
								</div>

								<div class="mb-3">
									<label for="passwordReg" class="form-label ps-2">Пароль</label>
									<input name="user_password" type="password" class="form-control" id="passwordReg">
								</div>

								<div class="mb-3">
									<label for="passwordConfirmREG" class="form-label ps-2">Подтвердите пароль</label>
									<input name="passwordConfirm" type="password" class="form-control" id="passwordConfirmREG">
								</div>
								<div class="m-3 d-flex align-items-center">
									<input style="margin: 0 5px 0 0" class="form-check-input " type="checkbox" name='isAdmin' value="1" id="flexCheckDefault">
									<label class="form-check-label" for="flexCheckDefault">
										Сделать админом
									</label>
								</div>
								<!-- <div class="mb-3">
									<label class="form-label ps-2">Роль пользователя</label>
									<select class="form-select" aria-label="Default select example">
										<option value="1" selected>User</option>
										<option value="2">Admin</option>
									</select>
								</div> -->
								<div class='d-flex justify-content-center mt-4 mb-3'>
									<button type="submit" name="btn-reg" style="width: 33%;" class="btn btn-warning">Создать пользователя</button>
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
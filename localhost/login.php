<?php
	include './app/database/session.php';
	include './app/database/connect.php';
	include './app/database/db.php';
	include './app/controllers/users.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./app/templates/head.php" ?>
</head>
<body>
    <?php include "./app/templates/header.php" ?>
    <div class="container login">
		<div class="row justify-content-center">
			<div class="col-8 mt-4 mb-4">
				<div class="header h2"  >Введите данные аккаунта</div>
				<!-- <div class="messege-error alert alert-danger" role="alert">Авария если что не так</div> -->
				<?php if($errMsg !== '')
					echo '<div class="messege-error alert alert-danger" role="alert">'.$errMsg.'</div>'
				?>
				<form class="data-user row my-2" method="post" action="login.php">

					<div class="mb-3">
						<label for="emailAuth" class="form-label">Email адрес</label>
						<input name="email" value="<?=$email?>"type="email" class="form-control" id="emailAuth" >
					</div>

					<div class="mb-3">
						<label for="passwordAuth" class="form-label">Пароль</label>
						<input name="user_password" type="password" class="form-control" id="passwordAuth">
					</div>

					<div class="btn-reg-login mt-3">
						<button class="login-btn col-12 col-md-4 btn btn-secondary" name='btn-log' value="1" type="submit">Войти</button>
						<a class="reg-btn col-12 col-md-5 btn btn-light" href="./reg.php">Зарегистироваться</a>
					</div>
				</form>
			</div>
		</div>
	</div>

    <?php include "./app/templates/footer.php" ?>
</body>
</html>
<header>
		<div class="con">
			<h2 class="logo">
				My blog 
			</h2>

			<ul class="navbar">
				<li class="navbar-item"><a class="navbar-link" href="/">Главная</a></li>
				<li class="navbar-item"><a class="navbar-link" href="">О нас</a></li>
				<li class="navbar-item"><a class="navbar-link" href="">Услуги</a></li>
				<li class="navbar-item user-select-list">
					<?php if(isset($_SESSION['id'])):?>		
						<a  class="navbar-link" href=""><i class='fa fa-user icon'></i>
							<?php if(mb_strlen(trim($_SESSION['username'],'UTF-8'))>10) echo trim(mb_strimwidth($_SESSION['username'], 0, 10)).'...'; else echo $_SESSION['username'];?>
						</a>
						<ul class="user-action">
							<?php if($_SESSION['name_role']=="admin"):?>
								<li class="navbar-item"><a class="navbar-link" href="admin.php">Админ панель</a></li>
							<?php endif; ?>
							<li class="navbar-item"><a class="navbar-link" href="login.php">Выход из аккаунта</a></li>
						</ul>
					<?php else: ?>
						<a class="navbar-link" href=""><i class='fa fa-user icon'></i>Кабинет</a>
						<ul class="user-action">
							<li style="font-size:1rem;" class="navbar-item"><a class="navbar-link" href="reg.php">Регистрация</a></li>
							<li style="font-size:1rem;" class="navbar-item"><a class="navbar-link" href="login.php">Вход</a></li>
						</ul>
					<?php endif; ?>
				</li>
				
			</ul>
		</div>
	</header>
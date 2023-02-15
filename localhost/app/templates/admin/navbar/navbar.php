<?php
	function sidebar($nameAction){
		if($nameAction=='posts'){$actionPost="show";$actionUsers="";$actionCategory=""; }
		if($nameAction=='users') {$actionPost="";$actionUsers="show";$actionCategory=""; }
		if($nameAction=='topic') {$actionPost="";$actionUsers="";$actionCategory="show"; }
		return "
<div class='admin-sidebar col-12 col-md-3 p-0 me-5' >

    <ul class='list-unstyled ps-0'>
		<li class='p-0'>
			<button 
				class='main-items btn btn-link align-items-center collapsed text-start text-white' data-bs-toggle='collapse' data-bs-target='#posts-collapse' aria-expanded='true'>
			Записи
			</button>
			<li class='border-top p-0'></li>
			<div class='collapse $actionPost' id='posts-collapse'>
				<ul class='btn-toggle-nav list-unstyled fw-normal = small'>
					<li class='sub-item p-2 ps-3'><a href='/admin/posts/index.php ' class='rounded text-white'>Управление статьями</a></li>
					<li class='sub-item p-2 ps-3'><a href='/admin/posts/create.php' class='rounded text-white'>Добавить статью</a></li>
				</ul>
				<li class='border-top p-0'></li>
			</div>
		</li >

		<li class='p-0'>
			<button 
					class='main-items btn btn-link align-items-center collapsed text-start text-white' data-bs-toggle='collapse' data-bs-target='#users-collapse' aria-expanded='true'>
			Пользователи
			</button>
			<li class='border-top p-0'></li>
			<div class='collapse $actionUsers' id='users-collapse'>
				<ul class='btn-toggle-nav list-unstyled fw-normal  small'>
					<li class='sub-item p-2 ps-3'><a href='/admin/users/create.php' class='rounded text-white'>Добавить пользователя</a></li>
					<li class='sub-item p-2 ps-3'><a href='/admin/users/index.php ' class='rounded text-white'>Изменить пользователя</a></li>
				</ul>
				<li class='border-top p-0'></li>
			</div>
		</li>
    
		<li>
			<button 
					class='main-items btn btn-link align-items-center collapsed text-start text-white' data-bs-toggle='collapse' data-bs-target='#category-collapse' aria-expanded='true'>
			Категории
			</button>
			<li class='border-top p-0'></li>
			<div class='collapse $actionCategory' id='category-collapse'>
				<ul class='btn-toggle-nav list-unstyled fw-normal  small'>
					<li class='sub-item p-2 ps-3'><a href='/admin/topic/create.php' class='rounded text-white'>Добавить категорию</a></li>
					<li class='sub-item p-2 ps-3'><a href='/admin/topic/index.php ' class='rounded text-white'>Изменить категорию</a></li>
				</ul>
				<li class='border-top p-0'></li>
			</div>
		</li>
    
    
    </ul>
  </div>";
}
<?php
	$all_posts = queryDB("SELECT * FROM posts WHERE deleted_at=0;")->fetchAll();

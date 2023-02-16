<?php
	$all_category = queryDB("SELECT * FROM category_posts WHERE deleted_at=0;")->fetchAll();

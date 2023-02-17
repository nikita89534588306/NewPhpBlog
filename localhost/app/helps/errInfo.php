<?php 
	if(count($errMsg)>0){
		echo "<div class='alert alert-danger mt-2' ><ul class='m-0'>";
			foreach($errMsg as $error) echo "<li>".$error."</li>";
		echo "</div></ul>";
	}
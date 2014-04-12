<?php

include_once('init.php');
if(isset($_POST['name'])){
	$name = trim($_POST['name']);

	if(empty($name)){
		$error = "You must submit a category name.";
	}else if(category_exists($name)){
		$error = "That category already exists.";
 	}else if( strlen($name) > 24){
 		$error = "Category names can only be up to 24 characters.";
 	}

 	if(!isset($error)){
 		add_category($name);
 	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content ="IE-edge, chrome=1">
	<title>Add a Category</title>
</head>
<body>
		<h1>Add a category</h1>
		<form action="" method="POST">
			<div>
				<label for="name"> Name </label>
				<input type="text" name="name" value="">
			</div>

			<div>
				<input type="submit" value="Add category">
			</div>
		</form>

</body>
</html>

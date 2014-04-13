<?php
include_once('init.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content ="IE-edge, chrome=1">
	<style>
	label{display: block;}
	</style>
	<title>Add a Post</title>
</head>
<body>
	<h1>Add a Post</h1>
	<form action='' method="post">
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" value="">
		</div>
		<div>
			<label for="contents">Contents</label>
			<textarea name="contents" rows="15" cols="50"></textarea>
		</div>
		<div>
			<label for="category"> Category </label>
			<select name="category">
				<?php
				foreach(get_categories() as $category){
					?>
					<option value="<?php echo $category['id']; ?>">
					<?php echo $category['name']; ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
		<div>
			<input type="submit" value="Add Post">
		</div>
	</form>
</body>
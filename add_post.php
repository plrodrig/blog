<?php
	include_once('init.php');

	if(isset($_POST['title'], $_POST['contents'], $_POST['category']) ){

		$errors   = array();
		$title 	  = trim($_POST['title']);
		$contents = trim($_POST['contents']);

		if( empty($title) ){
			$errors[] = "You need to supply a title.";
		}else if( strlen($title) > 255 ){
			$errors[] = "The title cannot be longer than 255 characters.";
		}
		if( empty($contents) ){
			$errors[] = "You need to supply some text.";
		}
		if( ! category_exists('id', $_POST['category']) ){
			$errors[] = "That category does not exist.";
		}
		if( empty($errors) ){
			add_post($title, $contents, $_POST['category']);
		}
		$id = mysql_insert_id();

		header('location: index.php?id={$id}' . $id);
		die();
	
	}

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
	<?php
	if( isset($errors) && ! empty($errors)){
		echo '<ul><li>', implode('</li><li>', $errors),'</li></ul>'; 
	}
	?>
	<form action="" method="post">
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" value="<?php if( isset($_POST['title']) ) echo $_POST['title']; ?> ">
		</div>
		<div>
			<label for="contents">Contents</label>
			<textarea name="contents" rows="15" cols="50"><?php if( isset($_POST['contents']) ) echo $_POST['contents']; ?> </textarea>
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
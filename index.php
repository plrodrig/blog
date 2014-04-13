<?php include_once('init.php');

$posts = (isset($_GET['id']) ) ? get_posts($_GET['id']) : get_posts();
#$posts = get_posts(((isset($_GET['id'])) ? $_GET['id'] : null));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content ="IE-edge, chrome=1">
	<style>
		ul{list-style-type:none;}
		li{display:inline; margin-right: 20px;}
	</style>
	<title>My Blog</title>
</head>
<body>
	<nav>
		<ul>
			<li><a href="index.php"> Index </a></li>
			<li><a href="add_post.php"> Add a Post </a></li>
			<li><a href="add_category.php"> Add a Category </a></li>
			<li><a href="category_list.php"> Category List </a></li>
		</ul>
	</nav>
	<h1>Priscilla's Blog</h1>
	<?php
	foreach ($posts as $post ) {
		if( ! category_exists('name', $post['name']) ){
			$post['name'] = "Uncategorized";
		}
		?>
		<h2><a href="index.php?id=<?php echo $post['post_id']; ?> "><?php echo $post['title']; ?></a></h2>
		<p>Posted on <?php echo date('d-m-Y h:i:s', strtotime($post['data_posted'])); ?> 
			in <a href="category.php?id=<?php echo $post['category_id']; ?>"><?php echo $post['name'];?></a>
		</p>
		<div><?php echo nl2br($post['contents']); ?></div>
		<?php
	}
	?>

</body>
</html>
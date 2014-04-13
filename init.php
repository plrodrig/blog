<?php

//set up connection to the databse
include_once('config.php');

//mysql_connect(DB_HOST, DB_USER, DB_PASS);
//mysql_select_db(DB_NAME);
$dbLocalhost = mysql_connect('localhost', 'root', '');
if (!$dbLocalhost){     
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('blog', $dbLocalhost);

//include blog functionality
include_once('blog.php');

?>
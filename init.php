<?php

//set up connect to the databse
include_once('config.php');
mysql_connect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);

//include blog functionality
include_once('blog.php');

?>
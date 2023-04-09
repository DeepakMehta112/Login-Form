<?php
session_start(); //this will start all our session
//creating localhost to store root,pass,database..
define('LOCALHOST', 'localhost');
define('ROOT', 'root');
define('PASSWORD', '');
define('DATABASE', 'login_db');
define('SITEURL', 'http://localhost/login%20form/'); //here is our site url for our project

//let us connect to our database
$conn = mysqli_connect(LOCALHOST,ROOT,PASSWORD,DATABASE);
$db_select = mysqli_select_db($conn, DATABASE);




?>	
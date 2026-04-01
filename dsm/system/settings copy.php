<?php 
@session_start();
@ob_start();
error_reporting(0);

define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'enurkompresor_user');
define('DB_PASSWORD', '@?W#LY4Z7-E}');
define('DB_NAME', 'enurkompresor_db');

# Connection to the database. #
$conn = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD)
or die('Unable to connect to MySQL');

$conn->set_charset("utf8");

# Select a database to work with. #
$selected = mysqli_select_db($conn, DB_NAME)
or die('Unable to connect to Database');


$query	= mysqli_query($conn,"SELECT * FROM site_ayar");
$ayar	= mysqli_fetch_array($query);
?>
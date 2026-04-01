<?php 
@session_start();
@ob_start();
error_reporting(0);

define('DB_HOSTNAME', getenv('DB_HOSTNAME') !== false && getenv('DB_HOSTNAME') !== '' ? getenv('DB_HOSTNAME') : 'localhost');
define('DB_USERNAME', getenv('DB_USERNAME') !== false && getenv('DB_USERNAME') !== '' ? getenv('DB_USERNAME') : 'enurcnc_user2');
define('DB_PASSWORD', getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : 'Y6IE}jyzgtkc');
define('DB_NAME', getenv('DB_NAME') !== false && getenv('DB_NAME') !== '' ? getenv('DB_NAME') : 'enurcnc_db');

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
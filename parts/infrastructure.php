<?php
$rootDir = realpath(__DIR__ . '/..');
include($rootDir . "/dsm/system/settings.php");
include($rootDir . "/dsm/system/functions.php");
$base=$ayar['website_link'];
$base2=$ayar['website_link']. '/en';
include("head.php");

$index_sector_query = mysqli_query($conn,"SELECT * FROM sektor WHERE statu = 1 ORDER BY `rank` ASC");
$header_sector_query = mysqli_query($conn,"SELECT * FROM sektor WHERE statu = 1 ORDER BY `rank` ASC");
$header_pe_urun_query = mysqli_query($conn,"SELECT * FROM urun WHERE statu = 1 AND page_alt_cat = 0 AND page_cat = 2 ORDER BY `rank` ASC");
$genel_urun = mysqli_query($conn,"SELECT * FROM urun WHERE statu = 1 AND page_alt_cat = 0 AND page_cat = 6 ORDER BY `rank` ASC");
$pirincler = mysqli_query($conn,"SELECT * FROM urun WHERE statu = 1 AND page_alt_cat = 0 AND page_cat = 7 ORDER BY `rank` ASC");

?>
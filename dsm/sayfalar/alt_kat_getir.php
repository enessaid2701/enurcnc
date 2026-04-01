<?php
include("../system/settings.php");
include("../system/functions.php");

$ana_kat_id = $_POST['ana_kat_id'];
$alt_kat = Sorgu("SELECT id, seo_title FROM urun_alt_kategori WHERE ana_kat = '$ana_kat_id' ");
// $alt_kat_values = Sonuc($alt_kat);

foreach($alt_kat as $alt_kat_value){

    $data[] = array('id' => $alt_kat_value['id'],
                    'seo_title' => $alt_kat_value['seo_title']);
}


echo json_encode($data);
exit;
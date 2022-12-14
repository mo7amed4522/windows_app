<?php
include '../connect.php';
$ID =filterRequest('ID');
$region = getOneData("re_na","path","`id_fil` = $ID");
$place = getOneData("id_na","path","`id_fil` = $ID");
$occurancy = getOneData("occ_na","path","`id_fil`=$ID");
$file = getOneData("fil_na","path","`id_fil` = $ID");
$path = "$region/$place/$occurancy/$file";
deleteFolder($path);
deleteData("files_Data",$ID);
<?php
include "../connect.php";
$ID = filterRequest("ID");
$region = getOneData("re_na","path","`id_fil` = $ID");
$place = getOneData("id_na","path","`id_fil` =$ID");
$occupancy =getOneData("occ_na","path","`id_fil` = $ID");
$Name = getOneData("fil_na","path","`id_fil` = $ID");
$path ="../upload/$region/$place/$occupancy/$Name/";
$data = imageUpload("word",$path);
echo json_encode(array("status"=>"success"));
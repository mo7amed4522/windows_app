<?php
include '../connect.php';
$ID = filterRequest("ID");
$region = getOneData("re_na","path","`id_fil`=$ID");
$place = getOneData("id_na","path","`id_fil`=$ID");
$occupancy = getOneData("occ_na","path","`id_fil`=$ID");
$file = getOneData("fil_na","path","`id_fil`=$ID");
$path = "$region/$place/$occupancy/$file";
$data = array
(
    "path" =>$path
);
echo json_encode(array("status"=>"success","path"=>$path));
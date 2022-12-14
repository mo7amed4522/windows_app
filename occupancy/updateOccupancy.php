<?php
include '../connect.php';
$ID = filterRequest("ID");
$name = filterRequest("name");
$data = array(
    "name" => $name,
);
$region =getOneData("nam_id","pathoccupancy","`occ_id` =$ID");
$place = getOneData("nam_pl","pathoccupancy","`occ_id`=$ID");
$occupancy = getOneData("nam_occ","pathoccupancy","`occ_id` = $ID");
$oldPath = "../upload/$region/$place/$occupancy";
$newPath = "../upload/$region/$place/$name";
rename($oldPath,$newPath);
updateData("place",$data,"`ID` = $ID");
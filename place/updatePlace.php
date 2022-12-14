<?php
include '../connect.php';
$ID = filterRequest("ID");
$name = filterRequest("name");
$data = array(
    "name" => $name,
);
$region =getOneData("reg_nam","pathplace","`pla_id` =$ID");
$place = getOneData("pla_nam","pathplace","`pla_id`=$ID");
$oldPath = "../upload/$region/$place";
$newPath = "../upload/$region/$name";
rename($oldPath,$newPath);
updateData("place",$data,"`ID` = $ID");

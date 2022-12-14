<?php
include '../connect.php';
$ID = filterRequest("ID");
$name =filterRequest("name");
$old_na = getOneData("name","region","`ID` =$ID");
$oldPath = "../upload/$old_na";
$newPath = "../upload/$name";
rename($oldPath,$newPath);
$data = array(
    "name"=>$name,
);
updateData("region",$data,"`ID` = $ID");

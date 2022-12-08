<?php
include '../connect.php';
$ID =filterRequest('ID');
$ID_Region = filterRequest("ID_Region");
$region = getOneData('name','region',"`ID` = $ID_Region");
$place = getOneData('name','place',"`ID` = $ID");
$path = "$region/$place";
deleteFolder($path);
deleteData("place",$ID);

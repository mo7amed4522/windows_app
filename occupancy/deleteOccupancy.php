<?php
include '../connect.php';
$ID =filterRequest('ID');
$ID_Region = filterRequest("ID");
$ID_Place = filterRequest("ID");
$region = getOneData('name','region',"`ID` = $ID_Region");
$region = getOneData('name','place',"`ID` = $ID_Place");
$occupancy = getOneData('name','occupancy',"`ID` = $ID");
$path = "$region/$ID_Place,$occupancy";
deleteFolder($path);
deleteData("occupancy",$ID);
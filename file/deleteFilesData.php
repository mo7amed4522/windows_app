<?php
include '../connect.php';
$ID =filterRequest('ID');
$ID_Region = filterRequest("ID");
$ID_Place = filterRequest("ID");
$ID_Occurancy = filterRequest("ID");
$region = getOneData("name","region","`ID` = $ID_Region");
$place = getOneData("name","place","`ID` = $ID_Place");
$occurancy = getOneData("name","occupancy","`ID`=$ID_Occurancy");
$file = getOneData("name","files_data","`ID` = $ID");
$path = "$region/$place/$occurancy/$file";
deleteFolder($path);
deleteData("files_Data",$ID);
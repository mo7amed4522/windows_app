<?php
include '../connect.php';
$ID =filterRequest('ID');
$region = getOneData('nam_id','pathoccupancy',"`occ_id` = $ID");
$place = getOneData('nam_pl','pathoccupancy',"`occ_id` = $ID");
$occupancy = getOneData('name','occupancy',"`ID` = $ID");
$path = "$region/$place,$occupancy";
deleteFolder($path);
deleteData("occupancy",$ID);
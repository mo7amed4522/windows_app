<?php
include '../connect.php';
$ID_Occupancy = filterRequest("ID_Occupancy");
getAllData('files_Data',"`ID_Occupancy` = $ID_Occupancy");
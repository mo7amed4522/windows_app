<?php
include '../connect.php';
$ID_Occupancy = filterRequest("ID_Occupancy");
getOneOfAllData('ID','name','files_Data',"`ID_Occupancy` = $ID_Occupancy");
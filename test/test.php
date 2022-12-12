<?php
include "../connect.php";
$ID_Occupancy = filterRequest("ID_Occupancy");
$region = getOneData("nam_id", "pathoccupancy", "`occ_id`= $ID_Occupancy");
$place = getOneData("nam_pl", "pathoccupancy", "`occ_id` = $ID_Occupancy");
$occupancy = getOneData("name", "occupancy", "`ID`=$ID_Occupancy");
$name ="متولي";
$path ="$region/$place/$occupancy/$name/";

   echo $path;
   imageUpload('word',$path);

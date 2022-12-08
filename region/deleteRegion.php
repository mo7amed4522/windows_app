<?php
include '../connect.php';
$ID = filterRequest('ID');
$en = getOneData('name','region',"`ID` =$ID");
deleteData("region", $ID);
deleteFolder($en);

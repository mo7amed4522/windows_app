<?php
include '../connect.php';
$ID = filterRequest("ID");
deleteData('region',"`region`.`ID` = ?");
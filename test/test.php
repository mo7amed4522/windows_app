<?php
include "../connect.php";
$ID = filterRequest("ID");
getOneData('name',"region","`ID` = ?",array($ID));


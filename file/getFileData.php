<?php
include '../connect.php';
$ID= filterRequest("ID");
getData("files_Data","`ID` = $ID");
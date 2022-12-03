<?php
include '../connect.php';
$ID =filterRequest('ID');
deleteData("files_Data",$ID);
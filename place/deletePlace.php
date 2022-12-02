<?php
include '../connect.php';
$ID =filterRequest('ID');
deleteData("place",$ID);
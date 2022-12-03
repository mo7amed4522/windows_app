<?php
include '../connect.php';
$ID =filterRequest('ID');
deleteData("occupancy",$ID);
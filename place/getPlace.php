<?php
include '../connect.php';
$ID_Region = filterRequest('ID_Region');
getAllData('place',"`ID_Region` =$ID_Region");
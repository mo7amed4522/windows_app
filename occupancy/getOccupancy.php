<?php
include '../connect.php';
$ID_Place = filterRequest('ID_Place');
getAllData('occupancy',"`ID_Place` =$ID_Place");
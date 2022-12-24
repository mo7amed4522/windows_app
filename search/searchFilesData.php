<?php
include '../connect.php';
$name = filterRequest("name");
getAllData("files_Data","`name` = '$name'");
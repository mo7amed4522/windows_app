<?php
include '../connect.php';
$name = filterRequest("name");
getData("files_Data","`name` = $name");
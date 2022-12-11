<?php
include "../connect.php";
$pla_id = filterRequest("pla_id");
$place = getOneData("pla_nam","pathplace","`pla_id` = $pla_id");
$region = getOneData("reg_nam","pathplace","`pla_id` =$pla_id");
echo "$region/$place";
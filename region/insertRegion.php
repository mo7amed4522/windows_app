<?php
include '../connect.php';
$name = filterRequest("name");
$stmt = $con->prepare("SELECT * FROM `region` WHERE `name` = ?");
$stmt->execute(array($name));
$count = $stmt->rowCount();
if($count > 0){
    printFailer();
}else{
    $data = array(
        "name" =>$name,
    );
    insertData("region" , $data);
    createFolder($name);
}
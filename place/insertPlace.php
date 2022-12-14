<?php
include '../connect.php';
$name = filterRequest("name");
$ID_Region = filterRequest("ID_Region");
$stmt = $con->prepare("SELECT * FROM `place` WHERE `name` = ? AND `ID_Region`= ?");
$stmt->execute(array($name,$ID_Region));
$count = $stmt->rowCount();
if($count > 0){
    printFailer();
}else{
    $data = array(
        "name" =>$name,
        "ID_Region"=>$ID_Region,
    );
    insertData("place" , $data);
    $region = getOneData("name","region","`ID` =$ID_Region");
    $path = "$region/$name";
    createFolder($path);
}
<?php
include  '../connect.php';
$name = filterRequest("name");
$ID_Place = filterRequest("ID_Place");
$ID=filterRequest('ID');
$stmt = $con->prepare("SELECT * FROM `occupancy` WHERE `ID_Place` = ?");
$stmt->execute(array($name));
$count = $stmt->rowCount();
if($count > 0){
    printFailer();
}else{
    $data = array(
        "name" =>$name,
        "ID_Place"=>$ID_Place,
    );
    insertData("occupancy" , $data);
$region = getOneData("name","region","`ID` = $ID");
$place = getOneData("name","place","`ID` = $ID_Place");
$path = "$region/$place/$name";
}
<?php
include  '../connect.php';
$name = filterRequest("name");
$ID_Place = filterRequest("ID_Place");
$stmt = $con->prepare("SELECT * FROM `occupancy` WHERE `name` = ? AND `ID_Place`=?");
$stmt->execute(array($name,$ID_Place));
$count = $stmt->rowCount();
if($count > 0){
    printFailer();
}else{
    $data = array(
        "name" =>$name,
        "ID_Place"=>$ID_Place,
    );
    insertData("occupancy" , $data);
$place = getOneData("pla_nam","pathplace","`pla_id` = $ID_Place");
$region = getOneData("reg_nam","pathplace","`pla_id` =$ID_Place");
$path= "$region/$place/$name";
createFolder($path);
}
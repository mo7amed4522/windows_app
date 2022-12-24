<?php
include '../connect.php';
error_reporting(0);
$name = filterRequest("name");
$address = filterRequest("address");
$owner = filterRequest("owner");
$number = filterRequest("number");
$ID_Card = filterRequest("ID_Card");
$phone = filterRequest("phone");
$date1 = filterRequest("date1");
$date2 = filterRequest("date2");
$choice = filterRequest("choice");
$ID_Occupancy = filterRequest("ID_Occupancy");
$region = getOneData("nam_id", "pathoccupancy", "`occ_id`= $ID_Occupancy");
$place = getOneData("nam_pl", "pathoccupancy", "`occ_id` = $ID_Occupancy");
$occupancy = getOneData("name", "occupancy", "`ID`=$ID_Occupancy");
$path = "$region/$place/$occupancy/$name/";
mkdir("../upload/$path",0777);
$word = imageUpload("word", "$path");
$scan = imageUpload("scan", "$path");
$photo = imageUpload("photo", "$path");
$stmt = $con->prepare("SELECT * FROM `files_Data` WHERE `name` = ? AND `ID_Occupancy` =?");
$stmt->execute(array($name,$ID_Occupancy));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailer();
} else {
    $data = array(
        "name" => $name,
        "address" => $address,
        "owner" => $owner,
        "number" =>$number,
        "ID_Card" => $ID_Card,
        "phone" => $phone,
        "date1" => $date1,
        "date2" => $date2,
        "choice"=>$choice,
        "ID_Occupancy" => $ID_Occupancy,
    );
    insertdata("files_Data", $data);
}

<?php
include '../connect.php';
$name = filterRequest("name");
$address = filterRequest("address");
$owner = filterRequest("owner");
$ID_Card = filterRequest("ID_Card");
$phone = filterRequest("phone");
$date1 = filterRequest("date1");
$date2 = filterRequest("date2");
$date3 = filterRequest("date3");
$date4 = filterRequest("date4");
$ID_Occupancy = filterRequest("ID_Occupancy");
$region = getOneData("nam_id", "pathoccupancy", "`occ_id`= $ID_Occupancy");
$place = getOneData("nam_pl", "pathoccupancy", "`occ_id` = $ID_Occupancy");
$occupancy = getOneData("name", "occupancy", "`ID`=$ID_Occupancy");
$path = "$region/$place/$occupancy/$name/";
mkdir("../upload/$path",0777);
//createFolder($path);
$word = imageUpload("word", "$path");
$scan = imageUpload("scan", "$path");
$photo = imageUpload("photo", "$path");
$stmt = $con->prepare("SELECT * FROM `files_Data` WHERE `name` = ?");
$stmt->execute(array($name));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailer();
} else {
    $data = array(
        "name" => $name,
        "address" => $address,
        "owner" => $owner,
        "ID_Card" => $ID_Card,
        "phone" => $phone,
        "word" => $word,
        "scan" => $scan,
        "photo" => $photo,
        "date1" => $date1,
        "date2" => $date2,
        "date3" => $date3,
        "date4" => $date4,
        "ID_Occupancy" => $ID_Occupancy,
    );
    insertdata("files_Data", $data);
}

<?php
include "../connect.php";
$ID = filterRequest("ID");
$name = filterRequest("name");
$address = filterRequest("address");
$owner = filterRequest("owner");
$ID_Card = filterRequest("ID_Card");
$phone = filterRequest("phone");
$date1 = filterRequest("date1");
$date2 = filterRequest("date2");
$number = filterRequest("number");
$choice = filterRequest("choice");
$region = getOneData("re_na","path","`id_fil` = $ID");
$place = getOneData("id_na","path","`id_fil` =$ID");
$occupancy =getOneData("occ_na","path","`id_fil` = $ID");
$oldName = getOneData("fil_na","path","`id_fil` = $ID");
$oldName ="../upload/$region/$place/$occupancy/$oldName";
$newName = "../upload/$region/$place/$occupancy/$name";
rename($oldName,$newName);
$data =array(
    "ID" =>$ID,
    "name" => $name,
    "address" => $address,
    "owner" => $owner,
    "ID_Card" => $ID_Card,
    "phone" => $phone,
    "date1" => $date1,
    "date2" => $date2,
    "number"=>$number,
    "choice"=>$choice,
);
updateData("files_Data",$data,"`ID` = $ID");
imageUpload("word",$newName);
imageUpload('scan',$newName);
imageUpload("photo",$newName);

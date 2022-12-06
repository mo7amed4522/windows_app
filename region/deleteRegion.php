<?php
include '../connect.php';
$ID =filterRequest('ID');
global $con;
$data = array();
$stmt = $con->prepare("SELECT `name` FROM `region` WHERE `ID` =$ID");
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0) {
    $name= $data['name'];
    deleteData("region",$ID);
    deleteFolder($name);
} else {
    echo json_encode(array("status" => "failure"));
}
return $count;

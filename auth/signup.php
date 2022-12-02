<?php
include "../connect.php";

$email = filterRequest("email");
$pass = sha1($_POST['pass']);
$repass = sha1($_POST['repass']);


$stmt = $con->prepare("SELECT * FROM `register` WHERE `email` = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if($count > 0){
    printFailer();
}else{
    $data = array(
        "email" =>$email,
        "pass"=>$pass,
        "repass" =>$repass,
    );
    insertData("register" , $data);
}
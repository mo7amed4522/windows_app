<?php
include "../connect.php";

$email = filterRequest("email");
$pass = sha1($_POST['pass']);
getData("register","`email` = ? AND `pass` = ?",array($email,$pass));
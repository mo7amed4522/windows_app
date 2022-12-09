<?php
$dsn = "mysql:host=127.0.0.1;dbname=windows_app";
$username = "root";
$password = '';
$option = array(
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" // For Arabic
);
$countrowinpage = 9;
try {
  $con = new PDO($dsn ,$username, $password, $option);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
  header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
  include "functions.php";
  if(!isset($notAuth)){
  }
} catch(PDOException $e) {
  echo $e->getMessage();
}
?>
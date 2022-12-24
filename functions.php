<?php

use function PHPSTORM_META\type;

define("MB", 1048576);

function filterRequest($requestname)
{
    return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

function getAllData($table, $where = null, $values = null,$json = true)
{
    global $con;
    $data = array();
    if($where == null){
    $stmt = $con->prepare("SELECT  * FROM $table ");
    }else{
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    }
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($json == true){
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
        return $count;
    }else{
        if($count > 0){
            return $data;
        }else{
            echo json_encode(array("status" => "failure"));
        }
    }
}
function getOneOfAllData($type,$type2,$table, $where = null, $values = null,$json = true)
{
    global $con;
    $data = array();
    if($where == null){
    $stmt = $con->prepare("SELECT  $type,$type2 FROM $table ");
    }else{
    $stmt = $con->prepare("SELECT  $type,$type2 FROM $table WHERE   $where ");
    }
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($json == true){
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
        return $count;
    }else{
        if($count > 0){
            return $data;
        }else{
            echo json_encode(array("status" => "failure"));
        }
    }
}

function getData($table, $where = null, $values = null)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE $where ");
    $stmt->execute($values);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure"));
    }
    return $count;
}

function insertData($table, $data, $json = true)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}


function updateData($table, $data, $where, $json = true)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0 || $count ==0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}

function deleteData($table, $where, $json = true)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE `ID` =$where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}

function imageUpload($imageRequest,$path)
{
    global $msgError;
    $imagename  = $_FILES[$imageRequest]['name'];
    $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
    $imagesize  = $_FILES[$imageRequest]['size'];
    $allowExt   = array("jpg","JPG", "png","PNG", "gif", "mp3", "pdf","docx",".");
    $strToArray = explode(".", $imagename);
    $ext        = end($strToArray);
    $ext        = strtolower($ext);

    if (!empty($imagename) && !in_array($ext, $allowExt)) {
        $msgError = "EXT";
    }
    if ($imagesize > 1000 * MB) {
        $msgError = "size";
    }
    if (empty($msgError)) {
        move_uploaded_file($imagetmp,  "../upload/$path" . $imagename);
        return $imagename;
    } else {
        return "fail";
    }
}
function updateimageUpload($imageRequest,$path)
{
    global $msgError;
    $imagename  = $_FILES[$imageRequest]['name'];
    $imagetmp   = null ?:$_FILES[$imageRequest]['tmp_name'];
    $imagesize  = null ?:$_FILES[$imageRequest]['size'];
    $allowExt   = array("jpg","JPG", "png","PNG", "gif", "mp3", "pdf","docx",".");
    $strToArray = explode(".", $imagename);
    $ext        = end($strToArray);
    $ext        = strtolower($ext);

    if (!empty($imagename) && !in_array($ext, $allowExt)) {
        $msgError = "EXT";
    }
    if ($imagesize > 1000 * MB) {
        $msgError = "size";
    }
    if (empty($msgError)) {
        move_uploaded_file($imagetmp,  "../upload/$path" . $imagename);
        return $imagename;
    } else {
        return "fail";
    }
}
function getOneData($type,$table,$where = null, $values = null)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT $type FROM $table WHERE $where ");
    $stmt->execute($values);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($count > 0) {
        return $data[$type];
    } else {
        echo json_encode(array("status" => "failure"));
    }
    //return $count;
}

function createFolder($dir)
{
    if (!file_exists($dir)) {
        mkdir("../upload/$dir",0777);
    } else {
        echo "The directory $dir exists.";
    }
}

function deleteFolder($path) {
    if (empty("../upload/$path")) {
        return false;
    }
    return is_file("../upload/$path") ?
            @unlink("../upload/$path") :
            array_map(__FUNCTION__, glob("../upload/$path".'/*')) == @rmdir("../upload/$path");
}

function printFailer()
{
    echo json_encode(array("status" => "failure"));
}

function printSucess()
{
    echo json_encode(array("status" => "success"));
}

function result($count)
{
    if($count >0){
        printSucess();
    }else{
        printFailer();
    }
}


function sendEmail($to, $title, $body)
{
$header = "From : support@mo7amed4522.com" ."\n" . "CC: ahmedmohamed4522@gmail.com"; 
mail($to, $title, $body, $header);
}


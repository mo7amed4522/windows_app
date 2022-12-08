<?php
include '../connect.php';
getAllData("files_Data","CURRENT_DATE()<=`date2`");
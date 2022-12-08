
<?php
include "../connect.php";
 $ne = getOneData('name','place',"`ID_Region` = 1");
 echo $ne;
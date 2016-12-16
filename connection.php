<?php
    $server ="localhost";
    $username = "root";
    $pass = "";
    $db_name = "staff";
    mysql_connect($server , $username , $pass);
    $selected = mysql_select_db($db_name);
    
/*if($selected){
    echo "Database selected";
}else{
    echo "Not selected";
}*/
?>
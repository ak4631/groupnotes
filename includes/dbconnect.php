<?php

$db_host="127.0.0.1";
$db_username="root";
$db_password="";
$dbname="chat_groups";

$conn=mysqli_connect($db_host,$db_username,$db_password,$dbname);

if(!$conn){
    echo "Error".mysqli_connect_error();
    exit;
}

?>
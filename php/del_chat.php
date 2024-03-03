<?php
require "../includes/dbconnect.php";

$chat_id=$_POST['id'];

$sql="delete from chatdata where chat_cnt='$chat_id'";
$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Error is: ".mysqli_error($conn);
    exit;
}
else{
    echo "1";
}
mysqli_close($conn);


?>
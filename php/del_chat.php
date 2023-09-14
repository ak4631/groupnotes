<?php
require "../includes/dbconnect.php";

$chat_id=$_GET['del_task'];

$sql="delete from chatdata where chat_cnt='$chat_id'";
$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Error is: ".mysqli_error($conn);
    exit;
}
else{
    echo "<script>window.open('GpInterface.php','_self');</script>";
}
mysqli_close($conn);


?>
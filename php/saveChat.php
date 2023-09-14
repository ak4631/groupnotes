<?php
require "../includes/dbconnect.php";
session_start();
$chat=$_POST['chat'];
$chat_gp_id=$_SESSION['id'];
$sql="insert into chatData (chat_id,chats) values('$chat_gp_id','$chat')";
$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Error is : ".mysqli_error($conn);
    exit;
}
else{
    echo "<script>window.open('GpInterface.php','_self');</script>";
}

?>
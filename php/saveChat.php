<?php
require "../includes/dbconnect.php";
session_start();
$chat=$_POST['chat'];
$chat = str_replace(chr(39), chr(34), $chat);

$chat_gp_id=$_SESSION['id'];
$chat=str_replace(' ','&nbsp;',$chat);
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
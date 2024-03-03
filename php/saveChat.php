<?php
require "../includes/dbconnect.php";

session_start();

$chat=($_POST['chat']);
$chat = str_replace(chr(39), chr(34), $chat);

$chat_gp_id=$_SESSION['id'];
$sql="insert into chatData (chat_id,chats) values('$chat_gp_id','$chat')";
$result=mysqli_query($conn,$sql);

if(!$result){
    echo 0;
}
else{
    echo 1;
}

?>
<?php 
require "../includes/dbconnect.php";
session_start();

$chat_id=$_SESSION['id'];
$sql2="select * from chatdata where chat_id='$chat_id' order by chat_cnt desc";
$res=mysqli_query($conn,$sql2);
$result_array=[];
$output="";
if(mysqli_num_rows($res)>0){
    // $output=;
    while($row=mysqli_fetch_assoc($res)){
        $decodedata=($row["chats"]);
        $output .="<div class='msg class_content'> <div class='chat-all'> <pre><p>$decodedata</p></pre> <button class='del_chat' data-id ={$row["chat_cnt"]}><i class='fa-sharp fa-solid fa-trash fa-lg' style='color: #d60000;'></i></button></div></div>";
    }

    mysqli_close($conn);
    echo $output;
}
else{
    echo $return = "<h4>No Record Found</h4>";
}

?>
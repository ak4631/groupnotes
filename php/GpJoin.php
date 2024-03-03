<?php
session_start();
require "../includes/dbconnect.php";

$gp_name=$_POST['gp-name'];
$gp_code=md5($_POST['gp-code']);

$sql="select gp_Name,gp_Code,gp_id from group_details where gp_code='$gp_code' and gp_Name='$gp_name'";

$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Error is: ".mysqli_error($conn);
    exit;
}

$row=mysqli_fetch_assoc($result);

if($row){
    $_SESSION['id']=$row['gp_id'];
    echo "<script>window.open('GpInterface.php','_self');</script>";
}
else{
    
    echo "<script>alert('Invalid Group Name or Code');</script>";
    echo "<script>window.open('../JoinGp.html','_self');</script>";
}



mysqli_close($conn);
?>
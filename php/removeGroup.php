<?php
require "../includes/dbconnect.php";

$gp_name=$_POST['gp-name'];
$gp_password=md5($_POST['gp-pass']);
$gp_admin=$_POST['ad-mail'];

$sql="select gp_Name,gp_Password,gp_Admin,gp_id from group_details where gp_Password='$gp_password' and gp_Name='$gp_name' and gp_Admin='$gp_admin'";

$result=mysqli_query($conn,$sql);

if(!$result){
    echo "Error is: ".mysqli_error($conn);
    exit;
}

$row=mysqli_fetch_assoc($result);

if($row){
   $group_id=$row['gp_id'];
   $del_sql="delete from group_details where gp_Password='$gp_password' and gp_Name='$gp_name' and gp_Admin='$gp_admin'";
   $more_del="delete from chatdata where chat_id='$group_id'";
   $pdf_del="delete from pdf_file where pdf_gp_id='$group_id'";
   $res1=mysqli_query($conn,$del_sql);
   $res2=mysqli_query($conn,$more_del);
   $res3=mysqli_query($conn,$pdf_del);

    if(!$res1 or !$res2 or !$res3){
        echo "Error is: ".mysqli_error($conn);
        exit;
    }
    else{
        echo "<script>alert('Group Deleted Successfully');</script>";
        echo "<script>window.open('../index.html','_self');</script>";
    }

}
else{
    echo "<script>alert('Incorrect Details');</script>";
}




?>
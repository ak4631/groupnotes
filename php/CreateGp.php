<?php

require "../includes/dbconnect.php";

$gp_name=$_POST['gp-name'];
$gp_password=$_POST['gp-pass'];
$gp_admin=$_POST['ad-mail'];
$gp_code=$_POST['gp-code'];

$sql1="select gp_Code from group_details where gp_Code='$gp_code'";

$res=mysqli_query($conn,$sql1);

if(!$res){
    echo "Error".mysqli_error($conn);
    exit;
}
$row_count=mysqli_num_rows($res);

if($row_count>0){
    echo "<script>alert('Try creating a unique group code');</script>";
     echo "<script>window.open('../index.html','_self');</script>";
   
}
else{
    $sql="insert into group_details (gp_Name,gp_Password,gp_Admin,gp_Code) values('$gp_name','$gp_password','$gp_admin','$gp_code')";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo "Error: ".mysqli_error($conn);
        exit;
    }
     echo "<script>window.open('../JoinGp.html','_self');</script>";

}

mysqli_close($conn);
?>
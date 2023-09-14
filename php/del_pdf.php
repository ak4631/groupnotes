<?php
require "../includes/dbconnect.php";

$pdf_un_id=$_GET['del_pdf_id'];
$pdf_name=$_GET['pdf_name'];
$file_to_Del=$pdf_name;

$sql="delete from pdf_file where pdf_cnt='$pdf_un_id'";
$result=mysqli_query($conn,$sql);

$dir="../uploads";
$dirHandle=opendir($dir);
while($file=readdir($dirHandle)){
    if($file==$file_to_Del){
        unlink($dir."/".$file);
    }
}
closedir($dirHandle);

if(!$result){
    echo "Error is: ".mysqli_error($conn);
    exit;
}
else{
    echo "<script>window.open('GpInterface.php','_self');</script>";
}
mysqli_close($conn);


?>
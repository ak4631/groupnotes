<?php
require "../includes/dbconnect.php";
session_start();
$pdf_gp_id=$_SESSION['id'];

if(isset($_POST['dataSubmit'])){
    $pdf=$_FILES['pdf']['name'];
    $pdf_type=$_FILES['pdf']['type'];
    $pdf_size=$_FILES['pdf']['size'];
    $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
    $pdf_store="../uploads/".$pdf;
    if($pdf==""){
        echo "<script>alert('Please Select a File');</script>";
        echo "<script>window.open('GpInterface.php','_self')</script>";
    }
    else{
            move_uploaded_file($pdf_tem_loc,$pdf_store);

        $sql="insert into pdf_file (pdf,pdf_gp_id) values('$pdf','$pdf_gp_id')";
        $query=mysqli_query($conn,$sql);

        echo "<script>window.open('GpInterface.php','_self');</script>";
    }
}




?>
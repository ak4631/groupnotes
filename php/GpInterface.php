<?php
session_start();
require "../includes/dbconnect.php";

$group_id=$_SESSION['id'];
$sql="select gp_Name from group_details where gp_id='$group_id'";
$result=mysqli_query($conn,$sql);

if($group_id==null){
  echo "<script>window.open('../JoinGp.html','_self');</script>";
}

if(!$result){
  echo "Error is: ".mysqli.error($conn);
  exit;
}

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Group Chat</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div id="main">
      <div id="gp-design">
        <div id="gp-name">
          <h1><?php echo $row['gp_Name'] ?></h1>
          <div class="links">
            <span class="all-pdfs-show"><a href="#"><i class="fa-sharp fa-solid fa-paperclip fa-xl" style="color: #ced4de;"></i></a></span>
            <a href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-xl" style="color: #a5ed07;"></i></a>
          </div>
        </div>
        <div class="main-content">
          <div id="gp-chats">
            <div class="msg">
              <?php 
                $chat_id=$_SESSION['id'];
                $sql2="select * from chatdata where chat_id='$chat_id'";
                $res=mysqli_query($conn,$sql2);

                if(!$res){
                  echo "Error is: ".mysqli_error($conn);
                  exit;
                }

                while($allChats=mysqli_fetch_assoc($res)){
                  $chat_num=$allChats['chat_cnt'];
              ?>
              <div class="chat-all">
              <p>
                <?php echo $allChats['chats'] ?>
              </p>
              <a href="del_chat.php?del_task=<?php echo $chat_num ?>" > <i class="fa-sharp fa-solid fa-trash fa-lg" style="color: #d60000;"></i></a>
                </div>
              <?php
                }
              ?>
            </div>
          </div>
          <footer>
            <div id="gp-send">
              <form action="saveChat.php" method="post">
                <input
                  type="text"
                  name="chat"
                  id="chat"
                  placeholder="Enter your Message"
                />
                <span class="bringup"><a href="#">Upload Pdf</a></span>
                <input type="submit" value="Send" id="send-message" />
                
              </form>
            </div>
          </footer>
        </div>


        <div class="uploadform">
          <div class="header">
            <h3>Upload Pdf Here</h3>
            <span class="clsform"><a href=""><i class="fa-sharp fa-solid fa-circle-xmark fa-lg" style="color: #d30d0d;"></i></a></span>
          </div>
          <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" value="Upload Your Files" name="pdf" id="pdf"/>
            <input type="submit" value="Upload" name="dataSubmit" />
          </form>
        </div>


        <div class="pdf-sec">
          <div class="title-pdf">
            <h1>ALL-PDFS</h1>
            <span class="hide-pdf"><a href=""><i class="fa-sharp fa-solid fa-circle-xmark fa-lg" style="color: #d30d0d;"></i></a></span>
          </div>
          <div class="pdfs-content">
            <?php
              $pd_gp_id=$_SESSION['id'];
              $sql3="select pdf,pdf_cnt from pdf_file where pdf_gp_id='$pd_gp_id'";
              $query=mysqli_query($conn,$sql3);
              while($info=mysqli_fetch_array($query)){  
            ?>
            <div class="pdf-here">
                <a href="../uploads/<?php echo $info['pdf'];?>" target="_blank"><?php echo $info['pdf'];?></a>
                <a href="del_pdf.php?del_pdf_id=<?php echo $info['pdf_cnt'];?>&pdf_name=<?php echo $info['pdf'];?>" > <i class="fa-sharp fa-solid fa-trash fa-lg" style="color: #d60000;"></i></a>
            </div>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/script.js"></script>
  </body>
</html>

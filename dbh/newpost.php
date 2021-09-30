<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location:../index.php');
}
if(!isset($_POST['desc'])){
    header('Location:../home.php');
    die();
  }
include('dbdata.php');
$con=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
$email=$_SESSION['user'];
$t=$_POST['plink'];

if (!isset($_POST['img_file'])) {
  $file = $_FILES['img_file'];


  print_r($file);
  $imageName = uniqid('', true);
  

  $fileName = $_FILES['img_file']['name'];
  $fileTmpName = $_FILES['img_file']['tmp_name'];
  $fileSize = $_FILES['img_file']['size'];
  $fileError = $_FILES['img_file']['error'];
  $fileType = $_FILES['img_file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');



  if (in_array($fileActExt, $allowed)) {
      if ($fileError === 0) {
          if ($fileSize > 1000000) {
              echo "Your Image is too big";
          } else {

              
              $fileNameNew = $imageName . "." . $fileActExt;
              $fileDestination = 'uploads/' . $fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);
              header('Location:../myposts.php?image-attach-success');
          }
      } else {
          echo "There was an error while uploading ur image";
      }
  } else {
      //echo "You cannot upload files of this type";
      $fileNameNew  = "sample.png";
  } 
} else{
  $fileNameNew  = "sample.png";
}
$description=$con->real_escape_string($_POST['desc']);
$sql="INSERT INTO masks(description,email,imgid) VALUES ('$description','$email','$fileNameNew')";
$result=$con->query($sql);
  if($result==TRUE){  
    header("Location:../$t"); 
  }else{ 
    header("Location:../$t?failed");
  }
$con->close();
?>
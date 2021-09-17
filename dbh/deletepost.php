<?php
$id=$_POST['id'];
 session_start();
 if(!isset($_SESSION['user'])){
     header('Location:../index.php');
 }
 if(!isset($_POST['id'])){
     header('Location:../home.php');
     die();
   }


   $id=$_POST['id'];
   echo("<h1>$id</h1>");

include('dbdata.php');
 $con=new mysqli($dbservername,$dbusername,$dbpassword,$dbname);
 $email=$_SESSION['user'];
 $sql="DELETE FROM masks WHERE id=$id";
 $result=$con->query($sql);
 if($result==TRUE){
     header('Location:../myposts.php');
 }else{
     header('Location:../myposts.php?failed');
 }
 $con->close();

 
 
?>
<?php
include('config.php');
  $uname=$_POST['uname'];
  $fees=$_POST['fees'];
  $desc=$_POST['desc'];
  $duraction=$_POST['duraction'];
  if($uname && $fees && $desc && $duraction){
    $co="INSERT INTO `courses`(`c_name`,`c_fees`, `duraction`, `c_description`) VALUES ('$uname','$fees','$duraction','$desc')";
    $ro=mysqli_query($conn,$co);
  }
?>
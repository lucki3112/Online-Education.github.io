<?php
include('config.php');
$id=$_POST['id'];
$sql="DELETE FROM `student` WHERE id='$id'";
$result=mysqli_query($conn,$sql);
?>
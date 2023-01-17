<?php
session_start();
include('config.php');
if($_SESSION['logged']==FALSE){
    header('location: login.php');
    exit();
}
$id=$_SESSION['id'];
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header('location: login.php');
    exit();
}
$c_id=$_GET['course_id'];
$s_id=$_SESSION['id'];
$sql="SELECT * FROM `student` WHERE id='$s_id'";
$result=mysqli_query($conn,$sql);
$sq="SELECT * FROM `courses` WHERE id=$c_id";
$re=mysqli_query($conn,$sq);
$s_row=mysqli_fetch_row($result);
$c_row=mysqli_fetch_row($re);
if(isset($_POST['course']) && isset($_POST['btn'])){
    $courses=implode(',',$_POST['course']);
    $swl="UPDATE `student` SET `courses`='$courses' WHERE id='$s_id'";
    $r=mysqli_query($conn,$swl);
    if($r){
        header('location: student_view.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>course</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    body{
        background-color: black;
    }
    .content{
        padding-top: 43px;
        border:2px solid black;
        padding-left: 43px;
        padding-bottom: 43px;
        border-radius: 23px;
        font-size: 23px;
        background-color: rgba(0,255,255,0.2);
        color:white;
    }
    .container{
        padding-top: 43px;
    }
    .form-check{
        padding-top:23px;
        font-size:23px;
    }
    .payment{
        border: 2px solid black;
        width: 313px;
        padding-left: 23px;
        border-radius: 20%;
        background-color: white;
        color: black;
    }
</style>  
</head>
  <body>
<div class="container">
    <div class="content">
       <b> Students name : <?php echo $s_row[3]; ?></b><br><br><br>
        <b>Payment methods </b><br><br>
        <div class="payment">
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="" id="" value="">
            Upi
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="" id="" value="">
            Credit/Debit/ATM Card
          </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="" id="" value="">
            Net Banking
          </label>
        </div><br><br>
        </div>
<br><br><b>Price : <?php echo $c_row[3]; ?></b><br><br>
<form action="" method="post" id="submit">
<div class="dis" style="display:none">
<input type="text" name="course[]" value="<?php echo $c_row[1];?>">
</div>
<button class="btn btn-outline-success" id="btn" name="btn">Continue</button>
</form><br>
<a href="product.php?product_number='<?php echo $c_row[0]; ?>'"><button class="btn btn-outline-primary">Back</button></a>
    </div>
</div>
  </body>
</html>
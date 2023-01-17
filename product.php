<?php
include("config.php");
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
$id=$_GET['product_number'];
$sql="SELECT * FROM `courses` WHERE id=$id";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($i=mysqli_fetch_row($result)){
        ?>
        <!doctype html>
        <html lang="en">
          <head>
            <title>Course</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          </head>
          <body style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJ4eZa7BsuJNuD3Id-YuwG1zkY8VVtARECYD0qXz4Pa96XRMyecKNIWbkCVpXNu_MjMjg&usqp=CAU');background-repeat: no-repeat;background-size: 100% 100%;">
            <style>
                 li{
                    padding-top: 13px;
                 }
                 ul{
                    list-style: none;
                 }
                 b{
                    font-size:23px;
                 }
            </style>
          <a href="student_view.php"> <button class="btn btn-outline-primary">Back</button></a> 
              <div class="container" style="text-align:center;padding-top:23px;">
              <ul>
            <img src="<?php echo $i[2]; ?>" style="height:378px;width:378px;border-radius: 143px;border:2px solid black;">
                <li><b><?php echo $i[1]; ?></b></li> 
                <li><b><?php echo $i[5]  ;?></b></li>
                <li><b>Fees : <?php echo $i[3]; ?></b></li>
                <li><b>Duraction : <?php echo $i[4]; ?></b></li>
                <li><a href="buy_now.php?course_id='<?php echo $i[0]; ?>'"><button class="btn btn-primary">Buy Now</button></a></li>
            </ul>
              </div>
          </body>
        </html>
        <?php
    }
}
?>
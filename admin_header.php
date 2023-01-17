<?php
session_start();
$id=$_SESSION['admin_id'];
include("config.php");
if($_SESSION['login']==FALSE){
    header('location:admin.php');
    exit();

}
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header('location:admin.php');
    exit();
}
$sql="SELECT * FROM `admin` WHERE id=1";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_row($result);
?>
<?php
if(isset($_FILES['image'])){
  $fname=$_FILES['image']['name'];
  $tmp_name=$_FILES['image']['tmp_name'];
  $f_path="image/";
  $f_path=$f_path.basename($fname);
  if(move_uploaded_file($tmp_name,$f_path)){
    $sq="UPDATE `admin` SET `image` = '$f_path' WHERE `admin`.`id` = 1";
    $res=mysqli_query($conn,$sq);
    if($res){
      header('location: admin_view.php');
    }
  }
}
if(isset($_POST['name'])){
  $name=$_POST['name'];
  $s="UPDATE `admin` SET `name` = '$name' WHERE `admin`.`id` = 1";
  $r=mysqli_query($conn,$s);
  if($r){
    header('location: admin_view.php');
  }
}
if(isset($_POST['email'])){
  $email=$_POST['email'];
  $u="UPDATE `admin` SET `email` = '$email' WHERE `admin`.`id` = 1";
  $p=mysqli_query($conn,$u);
  if($p){
    header('location: admin_view.php');
  }
}
if(isset($_POST['password'])){
  $password=$_POST['password'];
  $w="UPDATE `admin` SET `password` = '$password' WHERE `admin`.`id` = 1";
  $d=mysqli_query($conn,$w);
  if($d){
    header('location: admin_view.php');
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="admin.css">
</head>
  <body style="background-image: url('https://c0.wallpaperflare.com/preview/445/909/223/alotau-papua-new-guinea-png-canoe.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
    <div class="header">
    <marquee behavior="" direction="left"><h1>Admin Section</h1></marquee> 
    </div>
    <div class="container">
        <div class="sidenav" style="position: fixed;">
          <div class="profile">
          <form action="" id="frm"  method="post" enctype="multipart/form-data">
              <div class="upload">
                <img src='<?php echo $data[4]; ?>' width=125 height=125>
                <div class="round">
                  <input type="file" name="image" id="image" accept="image/*">
                  <i class="fa fa-camera"  style=""></i>
                </div>
              </div>
            </form>
          </div>
            <script>
              $(document).ready(function(){
                $('#image').on('change',function(){
                  $('#frm').submit();
                });
                $('#change').on('click',function(){
                  $('.name').hide();
                  $('.change-name').show();
                });
                $('#name').on('change',function(){
                  $('#name_frm').submit();
                });
                $('#change-email').on('click',function(){
                  $('.email').hide();
                  $('.change-email').show();
                });
                $('#email').on('change',function(){
                  $('email_frm').submit();
                });
                $('#change-password').on('click',function(){
                  $('.password').hide();
                  $('.change-password').show();
                });
                $('#password').on('change',function(){
                  $('password_frm').submit();
                });
              });
            </script>
            <span class="name"  id="change"><b style="padding-right:7px"> Name : <?php  echo $data[3]; ?></b></span>
            <div class="change-name">
            <form action="" method="post" id="name_frm">
              <input type="text" class="form-control" name="name" id="name" value="<?php echo $data[3]; ?>">
            </form>
            </div> <br><br><br>
           <span class="email" id="change-email"><b style="padding-right:7px"> Email : <?php  echo $data[1]; ?></b></span>
           <div class="change-email">
            <form action="" method="post" id="email_frm">
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $data[1]; ?>">
            </form>
            </div> <br><br><br>
            <span class="password" id="change-password">Change Password</span>
            <div class="change-password">
            <form action="" method="post" id="password_frm">
              <input type="password" class="form-control" name="password" id="password" value="<?php echo $data[2]; ?>">
            </form>
            </div> <br><br><br>
          <div class="hyper"><a href="students_details.php">Students</a></div>
<form action="" method="post" id="logout">
<button type="submit" class="btn btn-primary" name="logout">LogOut</button>
</form>
        </div>

<?php include('header.php'); ?>
<?php
include('config.php');
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['login_btn'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql="SELECT * FROM `student` WHERE email='$email' AND password='$password'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_num_rows($result);
  if($row==1){
    session_start();
    $id=mysqli_fetch_row($result);
    $_SESSION['id']=$id[0];
    $_SESSION['logged']=TRUE;
    header('location: student_view.php');
  }
}
?>
<div class="content">
  <div class="sk">
  <div class="login-form">
<h2>  Student Login</h2>
<form action="" method="post">
<div class="form-group">
  <label for="form-control">Email</label>
  <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Enter your email">
</div>
<div class="form-group">
  <label for="form-control">Password</label>
  <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" aria-describedby="helpId">
</div><br>
<button class="btn btn-primary" name="login_btn">Log In</button>
</form>
</div>
  </div>
</div>

<?php include('footer.php') ?>

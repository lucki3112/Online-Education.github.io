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
$sql="SELECT * FROM `student` WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);
if(isset($_FILES['picture'])){
    $fname=$_FILES['picture']['name'];
    $tmp_name=$_FILES['picture']['tmp_name'];
    $f_path="image/";
    $f_path=$f_path.basename($fname);
    if(move_uploaded_file($tmp_name,$f_path)){
      $sq="UPDATE `student` SET `image`='$f_path' WHERE id='$id'";
      $res=mysqli_query($conn,$sq);
      if($res){
        header('location: student_view.php');
      }
    }
  }
  if(isset($_POST['name'])){
    $name=$_POST['name'];
    $s="UPDATE `student` SET `name`='$name' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['state'])){
    $state=$_POST['state'];
    $s="UPDATE `student` SET `state`='$state' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['city'])){
    $city=$_POST['city'];
    $s="UPDATE `student` SET `city`='$city' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['pin'])){
    $pin=$_POST['pin'];
    $s="UPDATE `student` SET `pin_code`='$pin' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['email'])){
    $email=$_POST['email'];
    $s="UPDATE `student` SET `email`='$email' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['mobile'])){
    $mobile=$_POST['mobile'];
    $s="UPDATE `student` SET `phone_number`='$mobile' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['pwd'])){
    $pwd=$_POST['pwd'];
    $s="UPDATE `student` SET `password`='$pwd' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['college'])){
    $college=$_POST['college'];
    $s="UPDATE `student` SET `college`='$college' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
  if(isset($_POST['roll'])){
    $roll=$_POST['roll'];
    $s="UPDATE `student` SET `roll`='$roll' WHERE id='$id'";
    $r=mysqli_query($conn,$s);
    if($r){
      header('location: student_view.php');
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="student.css">
</head>
  <body style="background-image: url('https://media.istockphoto.com/id/1341437653/photo/abstract-composition-with-connecting-dots-and-lines-futuristic-network-background-for.jpg?b=1&s=170667a&w=0&k=20&c=dvHp0Kmr1AnjtiVHSe_fSRCzwUThDPx_SlW_n1UUiPg=');background-repeat: no-repeat;background-size: 100% 100%;">
  <div class="container" >
        <div class="sidenav" style="position: fixed;">
          <div class="profile">
          <form action="" id="picture_frm"  method="post" enctype="multipart/form-data">
              <div class="upload">
                <img src='<?php echo $row[10]; ?>' width=125 height=125>
                <div class="round">
                  <input type="file" name="picture" id="picture" accept="image/*">
                  <i class="fa fa-camera"></i>
                </div>
              </div>
            </form>
          </div>
          <span class="name"  id="name"><b> Name : <?php  echo $row[3]; ?></b></span>
            <div class="change-name">
            <form action="" method="post" id="name_frm">
              <input type="text" class="form-control" name="name" id="sname" value="<?php echo $row[3]; ?>">
            </form>
            </div> <br><br>
            <b>Adress :</b><br>
            <span class="state"  id="change-state"><b> State : <?php  echo $row[5]; ?></b></span>
            <div class="change-state">
            <form action="" method="post" id="state_frm">
            <div class="col-md-12">
                <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="state" name="state" required>
      <option <?php  if($row[5]==''){ echo 'selected';}  ?> selected disabled value="">Choose...</option>
      <option <?php  if($row[5]=='Andhra Pradesh'){ echo 'selected';}  ?> value="Andhra Pradesh">Andhra Pradesh</option>
      <option <?php  if($row[5]=='Andaman and Nicobar Islands'){ echo 'selected';}  ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
      <option <?php  if($row[5]=='Arunachal Pradesh'){ echo 'selected';}  ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
      <option <?php  if($row[5]=='Assam'){ echo 'selected';}  ?> value="Assam">Assam</option>
      <option <?php  if($row[5]=='Bihar'){ echo 'selected';}  ?> value="Bihar">Bihar</option>
      <option <?php  if($row[5]=='Chandigarh'){ echo 'selected';}  ?> value="Chandigarh">Chandigarh</option>
      <option <?php  if($row[5]=='Chhattisgarh'){ echo 'selected';}  ?> value="Chhattisgarh">Chhattisgarh</option>
      <option <?php  if($row[5]=='Dadar and Nagar Haveli'){ echo 'selected';}  ?> value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
      <option <?php  if($row[5]=='Daman and Diu'){ echo 'selected';}  ?> value="Daman and Diu">Daman and Diu</option>
      <option <?php  if($row[5]=='Delhi'){ echo 'selected';}  ?> value="Delhi">Delhi</option>
      <option <?php  if($row[5]=='Lakshadweep'){ echo 'selected';}  ?> value="Lakshadweep">Lakshadweep</option>
      <option <?php  if($row[5]=='Puducherry'){ echo 'selected';}  ?> value="Puducherry">Puducherry</option>
      <option <?php  if($row[5]=='Goa'){ echo 'selected';}  ?> value="Goa">Goa</option>
      <option <?php  if($row[5]=='Gujarat'){ echo 'selected';}  ?> value="Gujarat">Gujarat</option>
      <option <?php  if($row[5]=='Haryana'){ echo 'selected';}  ?> value="Haryana">Haryana</option>
      <option <?php  if($row[5]=='Himachal Pradesh'){ echo 'selected';}  ?> value="Himachal Pradesh">Himachal Pradesh</option>
      <option <?php  if($row[5]=='Jammu and Kashmir'){ echo 'selected';}  ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
      <option <?php  if($row[5]=='Jharkhand'){ echo 'selected';}  ?> value="Jharkhand">Jharkhand</option>
      <option <?php  if($row[5]=='Karnataka'){ echo 'selected';}  ?> value="Karnataka">Karnataka</option>
      <option <?php  if($row[5]=='Kerala'){ echo 'selected';}  ?> value="Kerala">Kerala</option>
      <option <?php  if($row[5]=='Madhya Pradesh'){ echo 'selected';}  ?> value="Madhya Pradesh">Madhya Pradesh</option>
      <option <?php  if($row[5]=='Maharashtra'){ echo 'selected';}  ?> value="Maharashtra">Maharashtra</option>
      <option <?php  if($row[5]=='Manipur'){ echo 'selected';}  ?> value="Manipur">Manipur</option>
      <option <?php  if($row[5]=='Meghalaya'){ echo 'selected';}  ?> value="Meghalaya">Meghalaya</option>
      <option <?php  if($row[5]=='Mizoram'){ echo 'selected';}  ?> value="Mizoram">Mizoram</option>
      <option <?php  if($row[5]=='Nagaland'){ echo 'selected';}  ?> value="Nagaland">Nagaland</option>
      <option <?php  if($row[5]=='Odisha'){ echo 'selected';}  ?> value="Odisha">Odisha</option>
      <option <?php  if($row[5]=='Punjab'){ echo 'selected';}  ?> value="Punjab">Punjab</option>
      <option <?php  if($row[5]=='Rajasthan'){ echo 'selected';}  ?> value="Rajasthan">Rajasthan</option>
      <option <?php  if($row[5]=='Sikkim'){ echo 'selected';}  ?> value="Sikkim">Sikkim</option>
      <option <?php  if($row[5]=='Tamil Nadu'){ echo 'selected';}  ?> value="Tamil Nadu">Tamil Nadu</option>
      <option <?php  if($row[5]=='Telangana'){ echo 'selected';}  ?> value="Telangana">Telangana</option>
      <option <?php  if($row[5]=='Tripura'){ echo 'selected';}  ?> value="Tripura">Tripura</option>
      <option <?php  if($row[5]=='Uttar Pradesh'){ echo 'selected';}  ?> value="Uttar Pradesh">Uttar Pradesh</option>
      <option <?php  if($row[5]=='Uttarakhand'){ echo 'selected';}  ?> value="Uttarakhand">Uttarakhand</option>
      <option <?php  if($row[5]=='West Bengal'){ echo 'selected';}  ?> value="West Bengal">West Bengal</option>
    </select>
  </div> 
</form>
            </div> <br>
            <span class="city"><b> City : <?php  echo $row[4]; ?></b></span>
            <div class="change-city">
            <form action="" method="post" id="city_frm">
              <input type="text" class="form-control" name="city" id="city" value="<?php echo $row[4]; ?>">
            </form>
            </div> <br>
            <span class="pin"><b> Pin Code : <?php  echo $row[6]; ?></b></span>
            <div class="change-pin">
            <form action="" method="post" id="pin_frm">
              <input type="text" class="form-control" name="pin" id="pin" value="<?php echo $row[6]; ?>">
            </form>
            </div> <br><br>
            <b>Contact Info :</b><br>
            <span class="email"><b> Email : <?php  echo $row[1]; ?></b></span>
            <div class="change-email">
            <form action="" method="post" id="email_frm">
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $row[1]; ?>">
            </form>
            </div> <br>
            <span class="mobile"><b> Mobile number : <?php  echo $row[9]; ?></b></span>
            <div class="change-mobile">
            <form action="" method="post" id="mobile_frm">
              <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row[9]; ?>">
            </form>
            </div> <br>
            <span class="pwd"><b> Change password</b></span>
            <div class="change-pwd">
            <form action="" method="post" id="pwd_frm">
              <input type="password" class="form-control" name="pwd" id="pwd" value="<?php echo $row[2]; ?>">
            </form>
            </div> <br><br>
            <b>Academic Information :</b><br>
            <span class="college"><b> College name : <?php  echo $row[7]; ?></b></span>
            <div class="change-college">
            <form action="" method="post" id="college_frm">
              <input type="text" class="form-control" name="college" id="college" value="<?php echo $row[7]; ?>">
            </form>
            </div> <br>
            <span class="roll"><b> Roll Number : <?php  echo $row[8]; ?></b></span>
            <div class="change-roll">
            <form action="" method="post" id="roll_frm">
              <input type="text" class="form-control" name="roll" id="roll" value="<?php echo $row[8]; ?>">
            </form>
            </div> <br><br>
            <a href="my_courses.php"><b>Courses</b></a>
            <div id="logout">
            <form action="" method="post">
                <button class="btn btn-primary" name="logout">Logout</button>
            </form>
            </div>
            <script>
               $(document).ready(function(){
                $('#picture').on('change',function(){
                  $('#picture_frm').submit();
                });
                $('#name').on('click',function(){
                    $('#name').hide();
                    $('.change-name').show();
                });
                $('#sname').on('change',function(){
                    $('#name_frm').submit();
                });
                $('.state').on('click',function(){
                    $('.state').hide();
                    $('.change-state').show();
                });
                $('#state').on('change',function(){
                    $('#state_frm').submit();
                });
                $('.city').on('click',function(){
                    $('.city').hide();
                    $('.change-city').show();
                });
                $('#city').on('change',function(){
                    $('#city_frm').submit();
                });
                $('.pin').on('click',function(){
                    $('.pin').hide();
                    $('.change-pin').show();
                });
                $('#pin').on('change',function(){
                    $('#pin_frm').submit();
                });
                $('.email').on('click',function(){
                    $('.email').hide();
                    $('.change-email').show();
                });
                $('#email').on('change',function(){
                    $('#email_frm').submit();
                });
                $('.mobile').on('click',function(){
                    $('.mobile').hide();
                    $('.change-mobile').show();
                });
                $('#mobile').on('change',function(){
                    $('#mobile_frm').submit();
                });
                $('.pwd').on('click',function(){
                    $('.pwd').hide();
                    $('.change-pwd').show();
                });
                $('#pwd').on('change',function(){
                    $('#pwd_frm').submit();
                });
                $('.college').on('click',function(){
                    $('.college').hide();
                    $('.change-college').show();
                });
                $('#college').on('change',function(){
                    $('#college_frm').submit();
                });
                $('.roll').on('click',function(){
                    $('.roll').hide();
                    $('.change-roll').show();
                });
                $('#roll').on('change',function(){
                    $('#roll_frm').submit();
                });

               });
            </script>
        </div>
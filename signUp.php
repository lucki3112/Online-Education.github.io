<?php include("header.php");?>
<?php
include("config.php");
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['pin']) && isset($_POST['mobile']) &&  isset($_POST['signup_btn'])){
  $email =$_POST['email'];
  $password =$_POST['password'];
  $name =$_POST['name'];
  $state =$_POST['state'];
  $city =$_POST['city'];
  $pin =$_POST['pin'];
  $mobile =$_POST['mobile'];
  $sql="INSERT INTO `student`(`email`, `password`, `name`, `city`, `state`, `pin_code`,`phone_number`)VALUES ('$email','$password','$name','$city','$state','$pin','$mobile')";
  $result=mysqli_query($conn,$sql);
  if($result){
    header('location: login.php');
  }
}
?>
<div class="content" style="background-image: url('https://media.istockphoto.com/id/1290864946/photo/e-learning-education-concept-learning-online.jpg?b=1&s=170667a&w=0&k=20&c=9oioQy4ceAfWWlX5Jy2t4uEK6yDwYaY6mSpdWCxNdy0=');background-repeat: no-repeat;background-size: 100% 100%;">
  <div class="jk">
  <div class="signup-form">
    <h2 style="text-align: center;padding-top:13px;">Create Your Account</h2>
<form  id="lk" class="row g-3 needs-validation" method="post">
  <div class="col-md-4">
  <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
  <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password">
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-2">
    <label for="validationCustomUsername" class="form-label">Name</label>
      <input type="text" class="form-control" placeholder="" aria-label="" name="name">
  </div>
  <div class="col-md-12">
    <label for="validationCustom04" class="form-label">State</label>
    <select class="form-select" id="validationCustom04" name="state" required>
      <option selected disabled value="">Choose...</option>
      <option value="Andhra Pradesh">Andhra Pradesh</option>
      <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
      <option value="Assam">Assam</option>
      <option value="Bihar">Bihar</option>
      <option value="Chandigarh">Chandigarh</option>
      <option value="Chhattisgarh">Chhattisgarh</option>
      <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
      <option value="Daman and Diu">Daman and Diu</option>
      <option value="Delhi">Delhi</option>
      <option value="Lakshadweep">Lakshadweep</option>
      <option value="Puducherry">Puducherry</option>
      <option value="Goa">Goa</option>
      <option value="Gujarat">Gujarat</option>
      <option value="Haryana">Haryana</option>
      <option value="Himachal Pradesh">Himachal Pradesh</option>
      <option value="Jammu and Kashmir">Jammu and Kashmir</option>
      <option value="Jharkhand">Jharkhand</option>
      <option value="Karnataka">Karnataka</option>
      <option value="Kerala">Kerala</option>
      <option value="Madhya Pradesh">Madhya Pradesh</option>
      <option value="Maharashtra">Maharashtra</option>
      <option value="Manipur">Manipur</option>
      <option value="Meghalaya">Meghalaya</option>
      <option value="Mizoram">Mizoram</option>
      <option value="Nagaland">Nagaland</option>
      <option value="Odisha">Odisha</option>
      <option value="Punjab">Punjab</option>
      <option value="Rajasthan">Rajasthan</option>
      <option value="Sikkim">Sikkim</option>
      <option value="Tamil Nadu">Tamil Nadu</option>
      <option value="Telangana">Telangana</option>
      <option value="Tripura">Tripura</option>
      <option value="Uttar Pradesh">Uttar Pradesh</option>
      <option value="Uttarakhand">Uttarakhand</option>
      <option value="West Bengal">West Bengal</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">City</label>
    <input type="text" class="form-control" id="validationCustom03" name="city" required>
  </div>
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">Pin Code</label>
    <input type="text" class="form-control" id="validationCustom05" name="pin" required>
  </div>
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="validationCustom05" name="mobile" required>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="signup_btn">SignUp</button>
  </div>
</form>
</div>
</div>
</div>
<?php include("footer.php"); ?>

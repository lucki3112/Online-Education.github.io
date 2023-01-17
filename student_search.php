<?php
include('config.php');
$search=$_POST['search'];
$sql="SELECT * FROM `courses` WHERE c_name LIKE '%{$search}%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($i=mysqli_fetch_row($result)){
      ?>
<div class="search-box">
<div class="box" style="background-color:  rgba(0,255,0,0.3); color: white;
 width: 623px; height: 373px;
  padding-bottom:23px;
  padding-top:23px;
  border:2px solid black;
  margin: auto;
  border-radius: 33px;
  ">
<style>
    li{
        padding-top: 13px;
    }
    .btn-Success{
        width:73px;
        height:43px;
        background: green;
        color:white;
        border-radius: 23px;
    }
    .search-box{
        padding-top:23px;
    }
</style>
<ul style="list-style: none">
<li><img src='<?php echo $i[2]; ?>' style="width:100px; height:100px"></li>
<li><b><?php echo $i[1]; ?></b></li>
<li><b>Fees : <?php echo $i[3]; ?></b></li>
<li><b>Duraction : <?php echo $i[4]; ?></b></li>
<li><a href="product.php?product_number='<?php echo $i[0]; ?>'"><button class="btn-Success" id="buy">Buy</button></a></li>
</ul>
</div>
</div>
<?php
    }
}
else{
    echo '<h1 style="height:900px; color: white; padding-top:23px">No data found</h1>';
}
?>

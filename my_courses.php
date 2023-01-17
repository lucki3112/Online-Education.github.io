<?php include('student_header.php'); ?>
<div class="content" style="height:900px; padding-top:65px;">
    <?php $c_name=$row[11];
    $cl="SELECT * FROM `courses` WHERE c_name LIKE '%{$c_name}%'";
    $cr=mysqli_query($conn,$cl);
    if(mysqli_num_rows($cr)>0){
        while($j=mysqli_fetch_row($cr)){
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
    <li><img src='<?php echo $j[2]; ?>' style="width:100px; height:100px"></li>
    <li><b><?php echo $j[1]; ?></b></li>
    <li><b>Fees : <?php echo $j[3]; ?></b></li>
    <li><b>Duraction : <?php echo $j[4]; ?></b></li>
    <li><a href="student_view.php"><button class="btn-Success">Back</button></a></li>
    </ul>
    </div>
    </div>
    <?php
        }
    }
    ?>
</div>
<?php include('student_footer.php'); ?>
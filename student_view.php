<?php include('student_header.php');  ?>
<div class="content">
<div class="search" style="position: fixed; padding-top:13px; padding-left: 123px;padding-bottom: 23px">
    <form class="d-flex" role="search" id="search_form">
        <input class="form-control me-2" type="search" id="search" placeholder="Search your course" aria-label="search" style="height: 33px;">
        <button class="btn btn-outline-success" id="search_btn">Search</button>
    </form>
</div><br><br>
<div class="loki">
<?php
$sql="SELECT * FROM `courses`";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($i=mysqli_fetch_row($result)){
      ?>
<div class="search-box">
<div class="box" style="background-color: rgba(0,255,0,0.3); color: white;
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
        background: blue;
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
?>
</div>

</div>
<script>
            $(document).ready(function(){
              $('#search').on('keyup',function(){
                var search_term=$(this).val();
                $.ajax({
                  url: "student_search.php",
                  type: "post",
                  data: {search: search_term},
                  success: function(data){
                    $('.loki').html(data);
                  }
                });
              });
            });
          </script>
<?php include('student_footer.php'); ?>
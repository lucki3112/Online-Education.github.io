<?php include('admin_header.php') ?>
<div class="content" style="padding-left:343px;">
    <div id="modal">
        <div id="modal-box">
        <div id="close-btn">X</div>
            <span id="open">

            </span>
        </div>
    </div>
    <div class="add-course" style="padding-bottom:23px; padding-top:23px">
    <button class="btn btn-primary" id="add_btn">Add</button>
    </div>
    <?php
    $st="SELECT * FROM `courses`";
    $rt=mysqli_query($conn,$st);
    if(mysqli_num_rows($rt)>0){
    ?>
<table class="table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Image</th>
                <th>Fees</th>
                <th>Duraction</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
    <?php
        while($i=mysqli_fetch_row($rt)){
    ?>
    <tbody>
        <tr>
            <td><b><?php echo $i[1]; ?></b></td>
            <td>
                    <div class="upload">
                        <img src='<?php echo $i[2]; ?>' width=95 height=95>
                    </div>
            </div>
        </td>
            <td><b><?php echo $i[3]; ?></b></td>
            <td><b><?php echo $i[4]; ?></b></td>
            <td><b><?php echo $i[5]; ?></b></td>
            <td><button class="btn btn-danger" id="delete_btn" data-eid="<?php echo $i[0]; ?>">Delete</button>
        </td>
        </tr>
    </tbody>
    <?php
        }
    ?>
    </table>
<?php
    }
    ?>   
</div>
<script>
$(document).ready(function(){
$('#add_btn').on('click',function(){
$('#modal').show();
$.ajax({
    url: "course.php",
    type: "post",
    success: function(data){
        $('#modal-box #open').html(data);
    }
});
});
$('#close-btn').on('click',function(){
    $('#modal').hide();
});
$(document).on('click','#course_btn',function(){
    var uname=$('#uname').val();
    var ufees=$('#fees').val();
    var uduraction=$('#duraction').val();
    var udesc=$('#desc').val();
    $.ajax({
    url: "course_submit.php",
    type: "post",
    data: {uname: uname,fees: ufees,duraction: uduraction,desc: udesc},
    success: function(data){
        window.location="admin_view.php";
    }
});
});
$(document).on('click','#delete_btn',function(){
var fid=$(this).data('eid');
$.ajax({
    url: 'course_delete.php',
    type: "post",
    data: {id:fid},
    success: function(data){
        window.location="admin_view.php";
    }
});
});
});
</script>
<?php  include('admin_footer.php'); ?>

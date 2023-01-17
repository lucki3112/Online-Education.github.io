<?php include('admin_header.php') ;?>
<div class="content" style="height:900px; padding-left:365px;">
<?php
$student_details="SELECT * FROM `student`";
$query=mysqli_query($conn,$student_details);
if(mysqli_num_rows($query)>0){
    ?>
<table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>State</th>
                <th>City</th>
                <th>Pin Code</th>
                <th>Phone Number</th>
                <th>College</th>
                <th>Roll</th>
                <th>Image</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
    <?php
        while($j=mysqli_fetch_row($query)){
    ?>
    <tbody>
        <tr>
           <td><?php  echo $j[3]; ?></td> 
           <td><?php  echo $j[1]; ?></td> 
           <td><?php  echo $j[2]; ?></td> 
           <td><?php  echo $j[5]; ?></td> 
           <td><?php  echo $j[4]; ?></td> 
           <td><?php  echo $j[6]; ?></td> 
           <td><?php  echo $j[9]; ?></td> 
           <td><?php  echo $j[7]; ?></td> 
           <td><?php  echo $j[8]; ?></td> 
           <td><img src='<?php  echo $j[10]; ?>' height=95 width=95></td> 
           <td><?php  echo $j[11]; ?></td> 
           <td>
            <button class="btn btn-danger" id="s_delete_btn" data-eid="<?php echo $j[0];?>">Delete</button>
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
<a href="admin_view.php"><button class="btn btn-outline-primary">Back</button></a>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click','#s_delete_btn',function(){
var fid=$(this).data('eid');
$.ajax({
    url: 'student_delete.php',
    type: "post",
    data: {id:fid},
    success: function(data){
        window.location="students_details.php";
    }
});
});
    });
</script>
<?php include('admin_footer.php'); ?>
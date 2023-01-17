<?php
$conn=mysqli_connect('localhost','root','','moocs_course');
if(!$conn){
    echo "error". mysqli_connect_error();
}
?>
<?php
include('db/connection.php');
$id= (isset($_GET['del']) ? $_GET['del'] : null); 
$query=mysqli_query($conn,"delete  from category where id='$id'");
if($query){
    echo "<script> alert('Category Deleted')</script>";
    echo "<script>window.location='categories.php';</script>";
}else{
    echo "<script> alert('_Please Try Again')</script>";
    echo "<script>window.location='categories.php';</script>";
}
 ?>
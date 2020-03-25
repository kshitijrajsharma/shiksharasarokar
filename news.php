
<?php
session_start();
if($_SESSION['email']==true){

}else{
    header('location:admin_login.php');
}
?>
<?php
$page='news';
include('include/header.php');
 ?>
<div style="margin-left:5%; margin-top: 1%;width:70% ">
<div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href='home.php'>Home </a></li>
        <li class="breadcrumb-item active"><a href='news.php'>News </a></li>
    </ul>
</div>
    <div class="text-right">
        <button class="btn"><a href="addnews.php">Add News</a></button>
    </div>
   
        <?php 
        include('db/connection.php');
        
        ?> 
  

</div>
<?php
include('include/footer.php');
?>
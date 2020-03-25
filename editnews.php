
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
<?php 
include('db/connection.php');
$id= (isset($_GET['edit']) ? $_GET['edit'] : null); 
$title=null;
$description=null;
$query=mysqli_query($conn,"select * from news where id='$id'");
while ($row=mysqli_fetch_array($query)){
     $title=$row['title'];
     $description=$row['description'];
}

?>

<div style="margin-left:5%; margin-top: 1%;width:70% ">
    <form  action="editnews.php" onsubmit="validateform()"  method="post" name="categoryform">
        <h1> Update News</h1>
        <hr>
        <div class="form-group">
            <label for="email">Category</label>
            <input type="text" name="title" value="<?php echo $title;?>" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Description :</label>
            <textarea class="form-control" rows="5"  name="des" id="comment" ><?php echo $description;?></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Update Category">
        <input type="hidden" name="id" class="btn btn-primary" value="<?php echo $id;?>">
    </form>
    <script>
      function validateform(){
          var x = document.forms['categoryform']['title'].value;
          if(x==""){
              alert('News Title cannot be empty !');
            return false;
          }
      }
  </script>
</div>
<?php
include('include/footer.php');
?>
<?php
  include('db/connection.php');
  if(isset($_POST["submit"])){
         $title=$_POST['title'];
        if($title!=""){
           $description=$_POST['des'];
          $id1=$_POST['id'];
          $query1=mysqli_query($conn,"update  news set title='$title', description='$description' where id='$id1'");
          if($query1){
            echo "<script> alert('News updated Successfully')</script>";
            echo "<script>window.location='news.php';</script>";
          }else {
            # code...
            echo "<script> alert('Please Try Again ')</script>";
        }

    
        }
        
  }

?>

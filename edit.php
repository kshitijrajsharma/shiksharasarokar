
<?php
session_start();

if($_SESSION['email']==true){

}else{
    header('location:admin_login.php');
}
?>
<?php
$page='category';
include('include/header.php');
 ?>
<?php 
include('db/connection.php');
$id= (isset($_GET['edit']) ? $_GET['edit'] : null); 
$category=null;
$des=null;
$query=mysqli_query($conn,"select * from category where id='$id'");
while ($row=mysqli_fetch_array($query)){
     $category=$row['category_name'];
     $des=$row['des'];
}

?>

<div style="margin-left:5%; margin-top: 1%;width:70% ">
    <form  action="edit.php" onsubmit="validateform()"  method="post" name="categoryform">
        <h1> Update Categories</h1>
        <hr>
        <div class="form-group">
            <label for="email">Category</label>
            <input type="text" name="category" value="<?php echo $category;?>" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Description :</label>
            <textarea class="form-control" rows="5"  name="des" id="comment" ><?php echo $des;?></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Update Category">
        <input type="hidden" name="id" class="btn btn-primary" value="<?php echo $id;?>">
    </form>
    <script>
      function validateform(){
          var x = document.forms['categoryform']['category'].value;
          if(x==""){
              alert('Category name cannot be empty !');
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
         $category_name=$_POST['category'];
        if($category_name!=""){
           $des1=$_POST['des'];
          $id1=$_POST['id'];
          $query1=mysqli_query($conn,"update  category set category_name='$category_name', des='$des1' where id='$id1'");
          if($query1){
            echo "<script> alert('Category updated Successfully')</script>";
            echo "<script>window.location='categories.php';</script>";
          }else {
            # code...
            echo "<script> alert('Please Try Again ')</script>";
        }

    
        }
        
  }

?>

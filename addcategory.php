
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
<div style="margin-left:5%; margin-top: 1%;width:70% ">
    <form action="addcategory.php" onsubmit="validateform()"  method="post" name="categoryform">
        <h1> Add Categories</h1>
        <hr>
        <div class="form-group">
            <label for="email">Category</label>
            <input type="text" name="category" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Description :</label>
            <textarea class="form-control" rows="5"  name="des" id="comment" ></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
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
          $des=$_POST['des'];
          $query=mysqli_query($conn,"insert into category(category_name,des) values('$category_name','$des')");
          if($query){
            echo "<script> alert('Category Add Successfully')</script>";
          }else {
            # code...
            echo "<script> alert('Please Try Again ')</script>";
        }

    
        }
        
  }

?>




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
<div style="margin-left:5%; width:70% ">
<div>
    <ul class="breadcrumb">
    <li class="breadcrumb-item active"><a href='home.php'>Home </a></li>
    <li class="breadcrumb-item active"><a href='news.php'>News </a></li>
        <li class="breadcrumb-item active">Add News</li>
    </ul>
</div>
    <form action="addcategory.php" onsubmit="validateform()"  method="post" name="categoryform">
        <h1> Add News</h1>
        <hr>
        <div class="form-group">
            <label for="email">Title</label>
            <input type="text" placeholder="Enter Category Name" name="category" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Description :</label>
            <textarea class="form-control" placeholder="Enter Category Description" rows="5"  name="des" id="comment" ></textarea>
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



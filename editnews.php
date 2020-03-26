
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
$date=null;
$category=null;
$thumbnail=null;
$query=mysqli_query($conn,"select * from news where id='$id'");
while ($row=mysqli_fetch_array($query)){
      $title=$row['title'];
      $description=$row['description'];
      $date=$row['date'];
      $category=$row['category'];
      $thumbnail=$row['thumbnail'];
}

?>

<div style="margin-left:5%; margin-top: 1%;width:70% ">
    <form  action="editnews.php" onsubmit="validateform()" enctype="multipart/form-data" method="post" name="categoryform">
        <h1> Update News</h1>
        <hr>
        <div class="form-group">
            <label for="email">Title</label>
            <input type="text" name="title" value="<?php echo $title;?>" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Description :</label>
            <textarea class="form-control" rows="5"  name="description" id="comment" ><?php echo $description;?></textarea>
        </div>
        <div class="form-group">
            <label for="email">Date</label>
            <input type="date"  name="date" class="form-control" value="<?php echo $date;?>"id="email">
        </div>
        <div class="form-group">
            <label for="email">Category</label>
            <select name="categoryname" class="form-control" >
            <?php
            include('db/connection.php');
            $category1=null;

            $query= mysqli_query($conn,"select *  from category ");
            while($row=mysqli_fetch_array($query)){
                $category1= $row['category_name'];
                ?>
                <option value=" <?php echo $category1;?>"  <?php  if(strcmp($category,$category1)){echo 'selected';}?> ><?php echo $category1;?></option>
                <?php   } ?>
            </select>
           
        </div>
        <div class="form-group">
            <label for="email">Thumbnail</label> 
            <input type="file" name="thumbnailnew" value="<?php echo $thumbnail;?>" class="form-control img-thumbnail" id="email">
            <img style="width:100px;height:100px"  class="img img-thumbnail" src="images/<?php echo $thumbnail;?>" ></img>
        </div>
        
        <input type="submit" name="submit" class="btn btn-primary" value="Update News">
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
          $description=$_POST['description'];
          $date=$_POST['date'];
          $thumbnail=$_FILES['thumbnailnew']['name'];
          $tmp_thumbnail=$_FILES['thumbnailnew']['tmp_name'];
          $category=$_POST['categoryname'];
          $id1=$_POST['id'];

          move_uploaded_file($tmp_thumbnail,"images/$thumbnail");

          $query1=mysqli_query($conn,"update  news set title='$title', description='$description',date='$date',category='$category',thumbnail='$thumbnail' where id='$id1'");
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

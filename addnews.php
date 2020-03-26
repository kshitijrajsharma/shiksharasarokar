
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
    <form onsubmit="validateform()"  method="post" name="newsform" enctype="multipart/form-data">
        <h1> Add News</h1>
        <hr>
        <div class="form-group">
            <label for="email">Title</label>
            <input type="text" placeholder="Enter News Title" name="title" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="pwd">Description :</label>
            <textarea class="form-control" name="description" placeholder="Enter News Description" rows="5"  name="des" id="comment" ></textarea>
        </div>
        <div class="form-group">
            <label for="email">Date</label>
            <input type="date"  name="date" class="form-control" id="email">
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
                <option value="<?php echo $category1;?> "><?php echo $category1;?></option>
                <?php   } ?>
            </select>
           
        </div>
        <div class="form-group">
            <label for="email">Thumbnail</label>
            <input type="file"  name="thumbnailnew" class="form-control img-thumbnail" id="email">
        </div>
        
        <input type="submit" name="submit" class="btn btn-primary" value="Add News">
    </form>
    <script>
      function validateform(){
          var x = document.forms['newsform']['title'].value;
          var y = document.forms['newsform']['description'].value;
          var z = document.forms['newsform']['date'].value;
          if(x==""){
              alert('Title  cannot be empty !');
            return false;
          }
          if(y.length<100){
              alert('Descripiton of News is too small !');
            return false;
          }
          if(z==""){
              alert('Oops ! You forgot to mention Date ');
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

      move_uploaded_file($tmp_thumbnail,"images/$thumbnail");
          
            $query=mysqli_query($conn,"insert into news (title,description,date,category,thumbnail) values('$title','$description','$date','$category','$thumbnail')");
            if($query){
              echo "<script> alert('News Uploaded Successfully')</script>";
              echo "<script>window.location='news.php';</script>";
            }else {
              # code...
              echo "<script> alert('Please Try Again ')</script>";
          }
        }
        
  }

?>


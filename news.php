
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
    <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Date</th>
        <th scope="col">Category</th>
        <th scope="col">Thumnail</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include('db/connection.php');
        $query=mysqli_query($conn,"select * from news");
        while($row=mysqli_fetch_array($query)){

        ?>

        <tr>
            <th scope="row"><?php echo $row['id'];?></th>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['category'];?></td>
            <td><?php echo $row['thumbnail'];?></td>
            <td><a href="editnews.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</td>
            <td><a href="deletenews.php?del=<?php echo $row['id'];?>" class="btn btn-danger">Delete</td>
        </tr>
        <?php }?> 
    </tbody>
    </table>

</div>
<?php
include('include/footer.php');
?>
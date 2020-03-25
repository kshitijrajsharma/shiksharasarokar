
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
    <div class="text-right">
        <button class="btn"><a href="addcategory.php">Add Category</a></button>
    </div>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Category Name </th>
        <th scope="col">Description</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        <th scope="col">View</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include('db/connection.php');
        $query=mysqli_query($conn,"select * from category");
        while($row=mysqli_fetch_array($query)){

        ?>

        <tr>
            <th scope="row"><?php echo $row['id'];?></th>
            <td><?php echo $row['category_name'];?></td>
            <td><?php echo substr($row['des'],0,150);?></td>
            <td><a href="edit.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</td>
            <td><a href="delete.php?del=<?php echo $row['id'];?>" class="btn btn-danger">Delete</td>
        </tr>
        <?php }?> 
    </tbody>
    </table>

</div>
<?php
include('include/footer.php');
?>




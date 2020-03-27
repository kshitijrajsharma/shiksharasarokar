
<?php
include('include/home_header.php');
 ?>


    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            From the Firehose
          
        </h3>
     
        <?php 
        include('db/connection.php');
            $id=(isset($_GET['single']) ? $_GET['single'] : null); 
       
        $query=mysqli_query($conn,"select * from news where id='$id' ");
        $row=mysqli_fetch_array($query);
        $countstr=$row['count'];
        $count =(int)$countstr;
        $a=1;
        echo $countint=$count + $a;
        $query1=mysqli_query($conn,"update  news set count= '$countint' where id='$id'");
        ?>

          <div class="blog-post"> 
            <h3 class="blog-singlepost-title"><?php echo $row['title'];?></h3>
            <p class="blog-post-meta"><?php echo date("F jS,y",strtotime($row['date']));?></p>
            <p class="blog-post-meta"></p><img  class="img img-thumbnail" src="images/<?php echo $row['thumbnail'];?>" ></p>
            <p><?php echo $row['description'];?></p>
            
            

            
            
          </div><!-- /.blog-post -->

        

          

        </div><!-- /.blog-main -->
       


        <?php
      include('include/home_footer.php');
      ?>



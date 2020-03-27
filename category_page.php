
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
        $id=(isset($_GET['category']) ? $_GET['category'] : null); 
            $page=(isset($_GET['page']) ? $_GET['page'] : null); 
            if($page=="" || $page=="1"){
                $page1=0;
            }else{
                $page1=($page*4)-4;
            }

            $query=mysqli_query($conn,"select * from news where category='$id' limit $page1,4");  
        while($row=mysqli_fetch_array($query)){

        ?>
          <div class="blog-post"> 
            <h2 class="blog-post-title"><a class="text-dark" href="single_news.php?single=<?php echo $row["id"];  ?>">  <?php echo $row['title'];?>  </a></h2>
            <p class="blog-post-meta"><?php echo date("F jS,y",strtotime($row['date']));?></p>
            <p class="blog-post-meta"></p><img  style="width:50%;height:50%" class="img img-thumbnail" src="images/<?php echo $row['thumbnail'];?>" ></p>
            

            <p><?php echo substr( $row['description'],0,300);?></p>
            <a class="btn btn-outline-primary" href="single_news.php?single=<?php echo $row["id"];  ?>">Read More</a>
            
          </div><!-- /.blog-post -->

          <?php } ?>

          <ul class="pagination">
            <li class="page-item disabled">
            <a href="#" class="page-link">Prev </a> </li>
        <?php

            $sql= mysqli_query($conn,"select * from news");
            $count=mysqli_num_rows($sql);
            $a=$count/4;
            ceil($a);
            for($b=1;$b<=$a;$b++){
                ?>
            
                <li class="page-item"><a class="page-link" href="news_home.php?page=<?php echo $b;?>"
            ><?php echo $b; ?></a></li>
            <?php } ?>
                    <li class="page-item disabled">
                            <a href="#" class="page-link">Next </a> </li>
                        </ul>

        </div><!-- /.blog-main -->


        <?php
      include('include/home_footer.php');
      ?>
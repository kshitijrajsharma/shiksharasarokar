
        <aside class="col-md-4 blog-sidebar">



        <!-- <div class="panel panel-default">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-list-alt"></span><b>Trending News</b></div>
					<div class="panel-body">
						<div class="row">
							<div class="p-3 mb-3 bg-light rounded">
								<ul>

                <div class="row mb-2">
                <?php 
                  include('db/connection.php');
              
                  $query=mysqli_query($conn,"select * from news order by count desc limit 6");
                  while($row=mysqli_fetch_array($query)){

                  ?>

									<li class="news-item" href="news.php" ><?php echo $row["title"];  ?></li>
							
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="panel-footer">

					</div>
        </div> -->
                
          <div class="p-3 mb-3 bg-light rounded">
          <h4 class="font-italic">Trending News</h4>
          <ul>

                <div class="row mb-2">
                <?php 
                  include('db/connection.php');
              
                  $query=mysqli_query($conn,"select * from news order by count desc limit 6");
                  while($row=mysqli_fetch_array($query)){

                  ?>

									<li class="news-item" ><a class="text-dark"href="single_news.php?single=<?php echo $row["id"];  ?>"><?php echo $row["title"];  ?></a></li>
							
									<?php } ?>
								</ul>

            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

    <footer style="width:-webkit-fill-available;" class="blog-footer">
      <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="scripts/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
    
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });
    </script>
    <script type="text/javascript">
            $(function () {

            
            $(".news-demo-down-auto").bootstrapNews({
                    newsPerPage: 7,
                    autoplay: true,
              pauseOnHover: true,
              navigation: false,
                    direction: 'down',
                    newsTickerInterval: 1500,
                    onToDo: function () {
                    }
                });


            });
        </script>
         <script>
          function runMyFunction() {
             alert('_Please Try Again');
            </script>
  </body>
</html>
<?php 
include 'includes/db.php';
include 'includes/header.php';



    
//<!-- Navigation -->
   include 'includes/navigation.php';
     ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
             <?php 
                if(isset($_POST['submit'])){
                   $search =$_POST['search'];
                   $qurey ="SELECT * FROM `posts` WHERE post_tags LIKE '%$search%'";
                    $selectpost=mysqli_query($conn,$qurey);
                    if(!$selectpost){
                        die('QUERY FAILED');
                    }
                    $count=mysqli_num_rows($selectpost);
                    if( $count==0){
                        echo"NO POSTS";
                    }
                    else{
                        
               // $qurey="SELECT * FROM `posts`";
               // $run_query=mysqli_query($conn, $qurey);
                while($row_select=mysqli_fetch_array($selectpost)){
                    $post_title=$row_select['post_title'];
                    $post_author=$row_select['post_author'];
                     $post_date=$row_select['post_date'];
                     $post_image=$row_select['post_image'];
                     $post_content=$row_select['post_content'];
                    
              
                
             
                
                
                
                
                
                ?>
              
                  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"> <?=$post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on  <?=$post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?> " alt="">
                <hr>
                <p><?= $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                 <?php } ?>          
                  <?php  }
                }?>
                
                
                
                
                
                
              
               

                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
      <!-- Blog Sidebar Widgets Column -->
          <?php include 'includes/sidebar.php' ?>
           
           

        <hr>
 <!-- Footer -->
    <?php 
            include'includes/footer.php' 
            ?>
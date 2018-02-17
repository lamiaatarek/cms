<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/navigation.php';
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
             <?php
    if(isset($_GET['p_id'])){
       $p_id =$_GET['p_id'];
            $qury="SELECT * FROM `posts` WHERE post_id=$p_id";
            $select=mysqli_query($conn,$qury);
            while($row=mysqli_fetch_assoc( $select)){
                $post_id=$row['post_id'];
                 $post_author=$row['post_author'];
                 $post_title=$row['post_title'];
                 $post_category_id=$row['post_category_id'];
                 $post_status=$row['post_status'];
                 $post_image=$row['post_image'];
                 $post_tags=$row['post_tags'];
                 $post_content=$row['post_content'];
                 $post_comments=$row['post_comment_count'];
                 $post_date=$row['post_date'];
                } } ?>
                <!-- Title -->
                <h1><?=$post_title?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?=$post_author?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> <?=$post_date?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?=$post_image?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?=$post_content?></p>
            
                <hr>

                <!-- Blog Comments -->
                     <?php 
                     if(isset($_POST['create_comment'])){
                           $p_id =$_GET['p_id'];
                         $comment_author =$_POST['Author'];
                          $comment_email  =$_POST['Email'];
                          $comment_content =$_POST['comment'];
                  if(!empty(  $comment_author )&&!empty($comment_email )&&!empty( $comment_content)){
                    $insertcomm="INSERT INTO `comments`( `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`) VALUES 
                    (' $p_id ','$comment_author', '$comment_email',' $comment_content',now(),'unapproved')";
                   $creat_comment =mysqli_query($conn,$insertcomm);
                      if(!$creat_comment ){
                          die();
                      }
                      $qury="UPDATE `posts` SET `post_comment_count`=post_comment_count+1 WHERE post_id=$p_id";
                       $update_comment =mysqli_query($conn,  $qury);
                     
                      
                       } }?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form  method="post" action=""role="form">
                        <div class="form-group">
                          <label for="Author">Author</label>
                          <input type="text" name="Author" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="Email">Email</label>
                          <input type="text" name="Email" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="comment">Your Comment</label>
                          <input type="text" name="comment" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                $qury="SELECT * FROM `comments` WHERE comment_post_id=$p_id AND comment_status='Approved' ORDER BY comment_id DESC";
                $select=mysqli_query($conn,$qury);
            while($row=mysqli_fetch_assoc( $select)){
                $comment_author=$row['comment_author'];
                $comment_date=$row['comment_date'];
                $comment_content=$row['comment_content'];
           
                
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?=$comment_author?>
                            <small><?=$comment_date?></small>
                        </h4>
                        <?=$comment_content?>
                    </div>
                </div>
                <?php }?>

                <!-- Comment -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

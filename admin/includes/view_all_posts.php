<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered table-hover">
        <thead>
            <th>id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
           <th>Date</th>
            <th>Edit Post</th>
           <th>Delete Post</th>
        </thead>
        <tbody>
          <!--  <tr>
                <td>1</td>
                <td>lamia</td>
                <td>lolo</td>
                <td>ds</td>
                <td>ds</td>
                <td>ss</td>
                <td>sssss</td>
                <td>sssss</td>
                
                <td>7/7/2001</td>
            </tr>-->
            <?php 
            $qury="SELECT * FROM `posts`";
            $select=mysqli_query($conn,$qury);
            while($row=mysqli_fetch_assoc( $select)){
                $post_id=$row['post_id'];
                 $post_author=$row['post_author'];
                 $post_title=$row['post_title'];
                 $post_cat=$row['post_category_id'];
                 $post_status=$row['post_status'];
                 $post_image=$row['post_image'];
                 $post_tags=$row['post_tags'];
                 $post_comments=$row['post_comment_count'];
                 $post_date=$row['post_date'];
          
            echo"<tr>";
            echo"<td> $post_id</td>";
             echo"<td> $post_author</td>";
             echo"<td> $post_title</td>";
             echo"<td> $post_cat</td>";
               /* $qury="select * from categories where cat_id= '$post_cat'";
                $select_cat=mysqli_query($conn,$qury);
                  while($row=mysqli_fetch_assoc( $select_cat)){
                      $cat_id=$row['cat_id'];
                       $cat_title=$row['cat_title'];
                echo"<td> $cat_title</td>";*/
             echo"<td> $post_status</td>";
             echo"<td><img src='../images/$post_image' width='100' ></td>";
             echo"<td> $post_tags</td>";
             echo"<td> $post_comments</td>";
             echo"<td> $post_date</td>";
                 echo"<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
                 echo"<td><a href='posts.php?delete=$post_id'>Delete</a></td>";
            echo"</tr>";
             } ?>
        </tbody>
    </table>
    <?php
     if(isset($_GET['delete'])){
                          $post_id =$_GET['delete'];
                             $qury="DELETE FROM `posts` WHERE post_id=$post_id";
                             $delete_cat=mysqli_query($conn,$qury);
                            header('location:posts.php');}
    ?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table class="table table-bordered table-hover">
        <thead>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
           
            <th>Date</th>
            <th>Approve</th>
            <th>UnApprove</th>
            <th>Delete</th>
              <th>In Response to</th>
        </thead>
        <tbody>
               <?php 
            $qury="SELECT * FROM `comments`";
            $select=mysqli_query($conn,$qury);
            while($row=mysqli_fetch_assoc( $select)){
                  $comment_id=$row['comment_id'];
                  $comment_post_id=$row['comment_post_id'];
                      $comment_author=$row['comment_author'];    
                      
                    $comment_content=$row['comment_content'];
                    $comment_email=$row['comment_email'];
                    $comment_status=$row['comment_status'];
                    $comment_date=$row['comment_date'];


            echo"<tr>";
            echo"<td>  $comment_id </td>";
             echo"<td>  $comment_author </td>";
             echo"<td>  $comment_content </td>";
               echo"<td>   $comment_email</td>";
             echo"<td>  $comment_status</td>";

             echo"<td>  $comment_date</td>";
            // echo"<td> $post_cat</td>";
                
              
             
                 echo"<td><a href='comments.php?Approve= $comment_id'>Approve</a></td>";
                 echo"<td><a href='comments.php?UnApprove= $comment_id'>UnApprove</a></td>";
                 echo"<td><a href='comments.php?delete= $comment_id'>Delete</a></td>";
                 $qury="SELECT * FROM `posts` where post_id= $comment_post_id ";
                $select_comm=mysqli_query($conn,$qury);
                  while($row=mysqli_fetch_assoc( $select_comm)){
                      $post_id=$row['post_id'];
                       $post_title=$row['post_title'];
                       echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                  }
            echo"</tr>";
             } ?>
        </tbody>
    </table>
      <?php
    if(isset($_GET['Approve'])){
         $the_comment_id = $_GET['Approve']; 
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $the_comment_id   ";
    $approve_comment_query = mysqli_query($conn, $query);
header("Location: comments.php");   

    }
    ?>
         <?php
    if(isset($_GET['UnApprove'])){
         $the_comment_id = $_GET['UnApprove']; 
    $query = "UPDATE comments SET comment_status = 'UnApproved' WHERE comment_id = $the_comment_id   ";
    $approve_comment_query = mysqli_query($conn, $query);
header("Location: comments.php");   

    }
    ?>
       <?php
      if(isset($_GET['delete'])){
         $comment_id =$_GET['delete'];
        $deletecomm  ="DELETE FROM `comments` WHERE comment_id= $comment_id";
            $qury=mysqli_query($conn, $deletecomm);
      }
    ?>
    
</body>
</html>
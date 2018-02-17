
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
    <form action="" method="post" enctype="multipart/form-data">
       <div class="form-group">
           <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
       </div> 
       <div class="form-group">
           <label for="categories">Categories</label>
           <select name="categories" id="">
               <?php
                         /*  $query="SELECT * FROM categories ";
                       $selectcat=mysqli_query($conn ,$query);
                        while($row=mysqli_fetch_array($selectcat)){
                            $cat_id=$row['cat_id'];
                            $cat_title=$row['cat_title'];
                       echo"<option selected value='{$cat_id}'>{$cat_title}</option>";
                        }//while*/
               
                $qury="SELECT * FROM categories ";
                                       $select_cat=mysqli_query($conn, $qury);
                                       while($row_cat=mysqli_fetch_assoc($select_cat)){
                                           $cat_id=$row_cat['cat_id'];
                                           $cat_title=$row_cat['cat_title'];
                                            echo"<option selected value='$cat_id'>$cat_title</option>";}
               ?>
           </select>
       </div>
        <div class="form-group">
           <label for="author">Post Author</label>
            <input type="text" class="form-control" name="author">
       </div> 
        <div class="form-group">
           <label for="post_status">Post Status</label>
            <input type="text" class="form-control" name="post_status">
       </div> 
        <div class="form-group">
           <label for="post_image">Post image</label>
            <input type="file" name="post_image">
       </div> 
        <div class="form-group">
           <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
       </div> 
        <div class="form-group">
           <label for="post_content">Post content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
       </div> 
        <div class="form-group">
           
            <input type="submit" class=" btn btn-primary" name="create_post" value="publish post">
       </div> 
    </form>
    <?php
    if(isset($_POST['create_post'])){
        $post_category_id=$_POST['categories'];
        $post_title=$_POST['title'];
        $post_author=$_POST['author'];
        $post_status=$_POST['post_status'];
        $post_image=$_FILES['post_image']['name'];
         $post_image_temp=$_FILES['post_image']['tmp_name'];
        move_uploaded_file( $post_image_temp,"../images/$post_image");
         $post_tags=$_POST['post_tags'];
         $post_content=$_POST['post_content'];
         $post_date=date('d-m-y');
        $post_comment_count=4;
        $query="INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES ( '$post_category_id', '$post_title', '$post_author',now(),'$post_image', '$post_content', '$post_tags', '$post_comment_count', '$post_status')";
        $create_post=mysqli_query($conn,$query);
        if($create_post){
           echo "<script>alert('post has been inserted')</script>";
        }
        else{
            die('qury failed'.mysqli_error($conn));
        }
    }
    
    
    ?>
</body>
</html>
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
            }}
    ?>
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
            <input type="text" class="form-control" name="title" value="<?= $post_title?>">
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
               
                $qury="SELECT * FROM categories WHERE cat_id={$post_category_id}";
                                       $select_cat=mysqli_query($conn, $qury);
                                       while($row_cat=mysqli_fetch_assoc($select_cat)){
                                           $cat_id=$row_cat['cat_id'];
                                           $cat_title=$row_cat['cat_title'];
                                            echo"<option selected value='$cat_id'>$cat_title</option>";}
               ?>
           </select>
       </div>
        <?php
    if(isset($_POST['edit_post'])){
        
        $post_title=$_POST['title'];
         $post_author=$_POST['author'];
        $post_status=$_POST['post_status'];
        $post_image=$_FILES['post_image']['name'];
         $post_image_temp=$_FILES['post_image']['tmp_name'];
      
         $post_tags=$_POST['post_tags'];
         $post_content=$_POST['post_content'];
         $post_category_id=$_POST['categories'];
          move_uploaded_file( $post_image_temp,"../images/$post_image");
        if(empty( $post_image)){
            $query="SELECT * FROM posts WHERE post_id=$p_id";
            $select_image=mysqli_query($conn, $query);
             while($row=mysqli_fetch_assoc($select_image)){
                 $post_image=$row['post_image'];}
        }
        $query="UPDATE `posts` SET
        `post_category_id`= '$post_category_id',
        `post_title`='$post_title',
        `post_author`='$post_author',
       
        `post_date`=now(),
       
        `post_content`='$post_content',
        `post_tags`=' $post_tags',
        `post_status`='$post_status',
         post_image='{$post_image}' WHERE post_id={$p_id}";
        $edit_post=mysqli_query($conn,$query);
       //s header('location:posts.php');
    } ?>
        <div class="form-group">
           <label for="author">Post Author</label>
            <input type="text" class="form-control" name="author" value="<?= $post_author?>">
       </div> 
        <div class="form-group">
           <label for="post_status">Post Status</label>
            <input type="text" class="form-control" name="post_status" value="<?= $post_status?>">
       </div> 
        <div class="form-group">
          <img src="../images/<?=$post_image?>" width="100" alt="">
            <input type="file" name="post_image">
           
       </div> 
        <div class="form-group">
           <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags" value="<?= $post_tags?>">
       </div> 
        <div class="form-group">
           <label for="post_content">Post content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10" ><?= $post_content?></textarea>
       </div> 
        <div class="form-group">
           
            <input type="submit" class=" btn btn-primary" name="edit_post" value="edit post">
       </div> 
    </form>
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
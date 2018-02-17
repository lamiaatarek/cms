
                        
                           <form action="" method="post">
                              <div class="form-group">
                                   <label for="cat_title">Edit category</label>
                                  
                                   <?php 
                                   if(isset($_GET['edit'])){
                                   $cat_id= $_GET['edit'];
                                       $qury="SELECT * FROM `categories` WHERE cat_id= $cat_id ";
                                       $select_cat=mysqli_query($conn, $qury);
                                       while($row_cat=mysqli_fetch_assoc($select_cat)){
                                           $cat_id=$row_cat['cat_id'];
                                           $cat_title=$row_cat['cat_title'];
                                  
                                   
                                  
                                   
                                   ?>
                                    
                                   <input type="text" class="form-control" value="<?php if(isset($cat_title)) {echo $cat_title;}?>"  name="cat_title" >
                                 <?php  }
                                   }?>
                                   <?php 
                                  if(isset($_POST['update_category'])){
                                    $cat_title =$_POST['cat_title'];
                                      $qury="UPDATE categories SET cat_title = '$cat_title' WHERE cat_id =$cat_id";
                                        $update_cat=mysqli_query($conn, $qury);
                                      header('location:categories.php');
                                  }
                                  
                                  ?>
                            </div> 
                               <div class="form-group">
                                   <input type="submit" class="btn btn-primary" name="update_category" value="Edit category">
                               </div>
                           </form>


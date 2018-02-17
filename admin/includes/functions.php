   <?php
function insert_cat(){
    global $conn;
                           if(isset($_POST['submit'])){
                            $cat_title = $_POST['cat_title'];
                               if($cat_title==''){
                                   echo"This field should not be empty";
                               }
                               else{
                                $qury="INSERT INTO `categories`(`cat_title`) VALUES ( '$cat_title') ";
                               $insert_cat=mysqli_query($conn,$qury);
                               if(!$insert_cat){
                                   die;
                               }
                               
                           }}}
                           
                           ?>
                           
                                     <?php 
                                    function findallcat(){
                                        global $conn;
                                    $query="SELECT * FROM `categories`";
                       $selectcat=mysqli_query($conn ,$query);
                        while($row=mysqli_fetch_array( $selectcat)){
                            $cat_id=$row['cat_id'];
                            $cat_title=$row['cat_title'];
                            echo "<tr>";
                            echo "<td> $cat_id</td>";
                             echo "<td> $cat_title</td>";
                            echo"<td><a href='categories.php?Delete= $cat_id'>Delete</a></td>";
                             echo"<td><a href='categories.php?edit= $cat_id'>Edit</a></td>";
                               echo"</tr>" ;   
                       } } ?>
                       
                       <?php 
                         function Deletecat(){
                             global $conn;
                        if(isset($_GET['Delete'])){
                          $cat_id =$_GET['Delete'];
                             $qury="DELETE FROM `categories` WHERE cat_id=$cat_id";
                             $delete_cat=mysqli_query($conn,$qury);
                            header('location:categories.php');
                        }}
                        ?>
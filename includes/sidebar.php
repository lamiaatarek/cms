
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                <form method="post" action="search.php">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                       <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                    </form>
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                              $query="SELECT * FROM `categories`";
                                $run_query=mysqli_query($conn, $query);
                                while($row=mysqli_fetch_assoc($run_query)){
                                     $cat_id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    echo"<li><a href='category.php?category= $cat_id'>$cat_title</a></li>";
                                }
                                
                                
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        
                       
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        
        <!-- /.row -->
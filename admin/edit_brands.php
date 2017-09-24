<form action="" method="post">
          <div class="form-group">
                <label for="brand-title">Update Brand</label>
                            <?php
                               if(isset($_GET['edit']))
                               {
                                   $brand_id=$_GET['edit'];
                                   $query="SELECT * FROM brands WHERE brand_id=$brand_id";
                                   $select_brands_id=mysqli_query($connection,$query);
                              
                              while($row=mysqli_fetch_assoc($select_brands_id))
                               {
                                  $brand_id=$row['brand_id'];
                                  $brand_title=$row['brand_title'];
                                ?>
                                <input value="<?php if(isset($brand_title)){echo $brand_title;}?>" type="text" class="form-control" name="brand_title">
                            <?php }}?>    
                               <?php if(isset($_POST['update_category'])){
                                    $the_brand_title=$_POST['brand_title'];
                                    $query="UPDATE brands SET brand_title='{$the_brand_title}' WHERE brand_id={$brand_id}";
                                    $update_query=mysqli_query($connection,$query);
                                    if(!$update_query)
                                    {
                                        die('quary failed'.mysqli_error($connection));
                                    }
                                   
                                }
                                ?>
                            </div>
                            <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                            </div>
                </form>
                          
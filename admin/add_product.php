<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>
<?php
if(isset($_SESSION['username']))
{
    echo $_SESSION['username'];
}

?>

<?php
if(isset($_POST['add_product']))
{
    $product_title=$_POST['product_title'];
    $product_price=$_POST['product_price'];
    $product_price=$_POST['product_price'];
    $product_category_id=$_POST['product_category_id'];
    $product_brand_id=$_POST['product_brand_id'];
    $product_description=$_POST['product_description'];
    $product_image=$_FILES['product_image']['name'];
    $product_image_temp=$_FILES['product_image']['tmp_name'];
    $product_keyword=$_POST['product_keyword'];
    $product_qty=$_POST['product_qty'];
    $product_status=$_POST['product_status'];
    $product_add_date=date('d-m-y');
  
    
    move_uploaded_file($product_image_temp,"../img/$product_image");
    
    $query="INSERT INTO product(product_category_id,product_brand_id,product_title,product_price,product_description,product_image,product_keyword,product_qty,product_status,date) VALUES('{$product_category_id}','{$product_brand_id}','{$product_title}','{$product_price}','{$product_description}','{$product_image}','{$product_keyword}','{$product_qty}','{$product_status}',now()) "; 
    
    $create_product=mysqli_query($connection,$query);
    
    if(!$create_product)
    {
        die('QUARY FAILED'.mysqli_error($connection));
    }
    echo "YES UPDATED";
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ehut admin panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
-->

</head>

<body>
    
    <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">My Admin</a>
            </div>
                
                 <ul class="nav navbar-right top-nav">
                
                <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        <?php
                        if(isset($_SESSION['username']))
                        {
                            echo $_SESSION['username'];
                        }

                        ?>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
                
                  <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="add_brand.php"><i class="fa fa-fw fa-wrench"></i>Add Brand</a>
                    </li>
                     <li>
                        <a href="add_category.php"><i class="fa fa-fw fa-wrench"></i>Add Category</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>Product<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="view_product.php">View Product</a>
                            </li>
                            <li>
                                <a href="add_product.php">Add Product</a>
                            </li>
                        </ul>
                    </li>
                   <!-- <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i>Add Category</a>
                    </li>-->
                    

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="view_user_list.php">View User</a>
                            </li>
                            <li>
                                <a href="user_order_list.php">User Order List</a>
                            </li>
                        </ul>
                    </li>
                   
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Section
                            <small></small>
                        </h1>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label for="product_title">Product Title</label>
                <input type="text" class="form-control" name="product_title">
               
            </div>

            <div class="form-group">
            <label for="product_category">Product Category</label>
  
            <select name="product_category_id" value="">

              <?php
                global $connection;
                $query="SELECT * FROM categories";
                $select_categories=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($select_categories))
                {
                    $cat_id=$row['cat_id'];
                    $cat_title=$row['cat_title'];
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                }
                ?>
            

            </select>
                </div>
                
    
            <div class="form-group">
        <label for="product_price">Product Price</label>
            <input type="text" class="form-control" name="product_price">
        </div>
               <div class="form-group">
        <label for="product_description">Product Description</label>
            <input type="text" class="form-control" name="product_description">
        </div>
                
                
                
                 <div class="form-group">
            <label for="product_brand">Product Brand</label>
  
            <select name="product_brand_id" value="">

              <?php
                global $connection;
                $query="SELECT * FROM brands";
                $select_brands=mysqli_query($connection,$query);
                
                while($row=mysqli_fetch_assoc($select_brands))
                {
                    $brand_id=$row['brand_id'];
                    $brand_title=$row['brand_title'];
                    echo "<option value='$brand_id'>{$brand_title}</option>";
                }
                ?>
            

            </select>
                </div>
                
                  <div class="form-group">
        <label for="product_keyword">Product Quantity</label>
            <input type="text" class="form-control" name="product_qty">
        </div>
                
                <div class="form-group">
           <label for="post_status">Product Status</label>

                <select name="product_status" value="">

                    <option value=" ">Old Product</option>
                    <option value="New">New Product</option>
                     <option value="Sale">Sale</option>
                    

                </select>

                </div>
                
            <div class="form-group">
                <label for="product_image">Product Image</label>
                    <input type="file" name="product_image">
                </div>
            <div class="form-group">
        <label for="product_keyword">Product Keyword</label>
            <input type="text" class="form-control" name="product_keyword">
        </div>

        <!--    <div class="form-group">
        <label for="post_status"></label>

                <select name="post_status" value="">

                    <option value="draft">Post Status</option>
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>

                </select>


        
        <input type="text" class="form-control" name="post_status">
                </div>-->

                   <!-- <div class="form-group">
                <label for="post_image">Post Image</label>
                    <input type="file" name="image">
                </div>-->

                  <!--  <div class="form-group">
                <label for="post_tags">Post Tags</label>
                    <input type="text" class="form-control" name="post_tags">
                </div>-->

                  <!--  <div class="form-group">
                <label for="post_content">Post Content</label>
                        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>-->
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="add_product" value="Add Product">
                    </div>
                </form>
                </div>

                        
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
                       
 
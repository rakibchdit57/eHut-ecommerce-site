<?php include "db.php";?>
<?php ob_start();?>
<?php
if(isset($_POST['add_product']))
{
    $product_title=$_POST['product_title'];
    $product_price=$_POST['product_price'];
    $product_category_id=$_POST['produt_category_id'];
    $product_brand_id=$_POST['produt_brand_id'];
    $product_description=$_POST['product_description'];
    
    
    $product_image=$_FILES['product_image']['name'];
    $product_image_temp=$_FILES['product_image']['tmp_name'];
    
    $product_keyword=$_POST['product_keyword'];
   
    $product_add_date=date('d-m-y');
   /* $post_comment_count=4;*/
    
    move_uploaded_file($post_image_temp,"../img/$product_image");
    
    $query="INSERT INTO product(produt_category_id,produt_brand_id,product_title,product_price,product_description,product_image,product_keyword,now()) VALUES('{$produt_category_id}','{$produt_brand_id}','{$product_title}','{$product_price}','{$product_description}','{$product_image}','{$product_keyword}','{$product_add_date}') "; 
    
    $create_post_category=mysqli_query($connection,$query);
    
   if(!$create_post_category)
   {
       echo 'QUARY FAILED'.mysqli_error($connection);
   }
    
   /* $the_post_id=mysqli_insert_id($connection);*/
    
    /*echo "<p class='bg-success'>Product Added.<a href='../post.php?p_id={$the_post_id}'>View post</a>or<a href='edit_product.php'>Edit Post</a></p>";*/
    echo "<p class='bg-success'>Product Created</p>";
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

    <title>eHut Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">My Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
           
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                      
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="add_brand.php"><i class="fa fa-fw fa-bar-chart-o"></i>Add Brand</a>
                    </li>
                    <li>
                        <a href="add_category.php"><i class="fa fa-fw fa-table"></i>Add Category</a>
                    </li>
                   
        
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Product<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">View Product</a>
                            </li>
                            <li>
                                <a href="#">Add Product</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i>Profile</a>
                    </li>
                   
                         <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>User<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./post.php">View All User</a>
                            </li>
                            <li>
                                <a href="./post.php?source=add_post">Add User</a>
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
            
        
       <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="product_title">Product Title</label>
         <input type="text" class="form-control" name="product_title">
         </div>
    
           <div class="form-group"> 
            <label for="product_price">Product Price</label>
           <input type="text" class="form-control" name="product_price">
           </div>
        <div class="form-group">
            <label for="product_category">Product Category</label>
        <select name="product_category_id" value="">
        
        <?php
            global $connection;
            $query="SELECT * FROM categories";
            $select_categories=mysqli_query($connection,$query);
            confirm($select_categories);
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
            <label for="product_brand">Product Brand </label>

            <select name="product_brand_id" value="">
        
          <?php
            global $connection;
            $query="SELECT * FROM brands";
            $select_brands=mysqli_query($connection,$query);
            confirm($select_brands);
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
               <label for="product_keyword">Product Keyword</label>
        <textarea class="form-control" name="product_keyword" id="" cols="10" rows="10"></textarea>
           </div>
    
    
        <div class="form-group">
        <label for="product_description">Product Description</label>
        <textarea class="form-control" name="product_description" id="" cols="10" rows="10"></textarea> 
           </div>
        
           <div class="form-group">
               <label for="product_image">Product Image</label>
        <input type="file" name="product_image">
           </div>
    
        <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_product" value="Add Product">
        </div>
                        
                    </form>
                    </div>
                </div>
             </div>
        </div>
        

   <!-- </div>-->
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>

<?php
if(isset($_SESSION['username']))
{
    echo $_SESSION['username'];
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
                <li><a href="../profile.php">Home</a></li>
                
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
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
                     <!-- <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>-->
                   
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
                   </div>
                    
                    

                    <form action="" method="post">   
                    <table class="table table-bordered table-hover">
                        
                            <thead>
                            <tr>
                               
                                <th>Id</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Product Image</th>
                                <th>Product Title</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                                <th>Product Keyword</th>
                                <th>Date</th>
                                 <th>Edit</th>
                                 <th>Delete</th>
                               <!-- <th>Content</th>-->
                                                                
                            </tr>
                            </thead>
                         <tbody>
                            <?php
                               global $connection;
                               $query="SELECT * FROM product";
                               $select_product=mysqli_query($connection,$query);
                               while($row=mysqli_fetch_assoc($select_product))
                               { 
                                   $product_id=$row['product_id'];
                                   $product_title=$row['product_title'];
                                   
                                   $product_category_id=$row['product_category_id'];
                                   $product_brand_id=$row['product_brand_id'];
                                   
                                   $product_price=$row['product_price'];
                                   $product_description=$row['product_description'];
                                   $product_image=$row['product_image'];
                                   $product_keyword=$row['product_keyword'];
                                   $product_date=$row['date'];
                                   
                                   
                                   echo "<tr>";
                                
                                
                                ?>
                                  
                                   <?php
                                   echo "<td>$product_id</td>";
                                  
                                   
                                   $query="SELECT * FROM categories WHERE cat_id={$product_category_id}";
                                   $select_categories_id=mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_assoc($select_categories_id))
                                   {
                                       $cat_id=$row['cat_id'];
                                       $cat_title=$row['cat_title'];
                                       echo "<td>{$cat_title}</td>";
                                   }
                                   
                                     
                                   $query="SELECT * FROM brands WHERE brand_id={$product_brand_id}";
                                   $select_categories_id=mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_assoc($select_categories_id))
                                   {
                                       $brand_id=$row['brand_id'];
                                       $brand_title=$row['brand_title'];
                                       echo "<td>{$brand_title}</td>";
                                   }
                                   
                                   echo "<td><img width='100' class='img-responsive' src='../img/$product_image' alt='image'</td>";
                                   echo "<td>$product_title</td>";
                                   echo "<td>$product_price</td>";
                                   
                                   echo "<td>$product_description</td>";
                                    echo "<td>$product_keyword</td>";
                                   echo "<td>$product_date</td>";
                              
                                  
                                   echo "<td><a href='edit_product.php?p_id={$product_id}'>Edit</a></td>";
                                   echo "<td><a onclick=\"javascript: return confirm('Are You sure ?');\" href='view_product.php?delete={$product_id}'>Delete</a></td>";
                                   echo "</tr>";
                               }
                            ?>
                            
                           
                                
                        
                        </tbody>
                        
                        </table>
                    </form>
                     <?php
                       if(isset($_GET['delete']))
                       {
                           global $connection;
                           $the_product_id=$_GET['delete'];
                           $query="DELETE FROM product WHERE product_id={$the_product_id}";
                           $delete_query=mysqli_query($connection,$query);
                           if(!delete_query)
                           {
                               die('QUARY FAILEd'.mysqli_error($connection));
                           }
                           header("Location: view_product.php");
                       }
                        ?>

                        
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
                       
 
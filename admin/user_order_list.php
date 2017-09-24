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
                <li><a href="../index.php">Home</a></li>
                
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
                     
                        
                        <li class="divider"></li>
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
                            
                        </h1>
                   </div>
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                <th>Username</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Product Quantity</th>
                                <th>Product Price</th>
                                <th>Product Price</th>
                                <th>Address</th>
                                 <th>Date</th>
                               
                          
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                               global $connection;
                                $query1="SELECT * FROM user_address";
                                $select_address=mysqli_query($connection,$query1);
                                
                                while($row=mysqli_fetch_assoc($select_address))
                                {
                                    
                                   $user_address=$row['u_address'];
                                    $date=$row['date'];
                                }
                                
                               $query="SELECT * FROM cart";
                               $select_order_from_cart=mysqli_query($connection,$query);
                               while($row=mysqli_fetch_assoc($select_order_from_cart))
                               { 
                                   $product_id=$row['p_id'];
                                   $user_id=$row['user_id'];
                                   $product_name=$row['product_title'];
                                   $product_image=$row['product_image'];
                                   $product_qty=$row['qty'];
                                   $product_price=$row['price'];
                                   $product_total_amount=$row['total_amt'];
                                   
                                   
                                   
                                   echo "<tr>";
                                   
                                   echo "<td><a href='view_individual_user.php?u_id=$user_id'>View User</a></td>";
                                  
                                   echo "<td>$product_name</td>";
                                  
                                  echo "<td><img width='60' class='img-responsive' src='../img/$product_image' alt='image'</td>";
                                   
                                   echo "<td>$product_qty</td>";
                                  
                                   
                                   echo "<td>$product_price</td>";
                                  
                              
                                   echo "<td>$product_total_amount</td>";
                                   
                                      echo "<td>$user_address</td>";
                                   echo "<td>$date</td>";
                                    
                                   
                                 /*  $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
                                   $select_post_id_query=mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_assoc($select_post_id_query)){
                                       $post_id=$row['post_id'];
                                       $post_title=$row['post_title'];
                                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</td>";
                                   }*/
                    
                         
                                /*   echo "<td>$post_content</td>";*/
                                  
                                   echo "</tr>";
                               }
                            ?>
                            
                         
                          <!--  <td>PosContent</td>-->
                                
                        
                        </tbody>
                        </table>
                     
                   

                        
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
                       
 
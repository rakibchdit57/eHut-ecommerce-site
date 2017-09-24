<?php include "db.php";?>
<?php ob_start();?>
<?php session_start();?>

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
                <a class="navbar-brand" href="index.php">My Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              <li><a href="index.php">Home</a></li>
           
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php
                            if(isset($_SESSION['username']))
                            {
                                echo $_SESSION['username'];
                            }

                        ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                                <a href="view_product.php">View Product</a>
                            </li>
                            <li>
                                <a href="add_product.php">Add Product</a>
                            </li>
                        </ul>
                    </li>
                     
                   
                         <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>User<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="view_user_list.php">View All User</a>
                            </li>
                             <li>
                                <a href="user_order_list.php">View All User</a>
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
                        <div class="col-xs-6">
                            <?php
                            {
                             if(isset($_POST['submit']))
                             {
                               global $connection;
                               $brand_title=$_POST['brand_title'];
                              if($brand_title==""||empty($brand_title))
                              {
                                echo "This field should not be empty";
                               }
                              else 
                              {
                             $query="INSERT INTO brands(brand_title) VALUES('{$brand_title}')";
                             $create_categories_value=mysqli_query($connection,$query);
                             if(!$create_categories_value)
                              die('Query Failed'.mysqli_error());
                                    }
                               }    
                            }
                            
                            ?>
                        <form action="" method="post">
                           <div class="form-group">
                               <label for="cat-title">Brand</label>
                            <input type="text" class="form-control" name="brand_title">
                            </div>
                            <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Brand">
                            </div>
                        </form>
                            <?php
                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                include "edit_brands.php";
                            }
                            ?>
                        </div>
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Brand Title</th>
                             </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <?php //SELECT ALL
                    
                              global $connection;
                             $query="SELECT * FROM brands";
                             $select_brands=mysqli_query($connection,$query);
                             while($row=mysqli_fetch_assoc($select_brands))
                             {
                                $brand_id=$row['brand_id'];
                                $brand_title=$row['brand_title'];
                                echo "<tr>";
                                echo "<td>{$brand_id}</td>";
                                echo "<td>{$brand_title}</td>";
                                echo "<td><a href='add_brand.php?delete={$brand_id}'>delete</a></td>";
                                echo "<td><a href='add_brand.php?edit={$brand_id}'>edit</a></td>";
                               echo "</tr>";
                             }            
    
                               
                            ?>
                                
                                
                                <?php //DELETE
                                global $connection;
                                if(isset($_GET['delete']))
                                {
                                 $the_brand_id=$_GET['delete'];
                                 $query="DELETE FROM brands WHERE brand_id={$the_brand_id}";
                                 $delete_query=mysqli_query($connection,$query);
                                 header('Location: add_brand.php');
                                 }
                                ?>
                                 </tr>
                            </tbody>
                            </table>
                        </div>
         
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

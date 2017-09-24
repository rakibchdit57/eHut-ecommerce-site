<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>



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
                        
                        
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
                
                  <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
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
                                <a href="#">Add User</a>
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
                            <small>Kazi Afroz</small>
                        </h1>
                   </div>
                            <?php
                    
                            if(isset($_GET['edit_users']))
                            {
                               global $connection;
                               $the_user_id=$_GET['edit_users'];
                               $query="SELECT * FROM users WHERE user_id= $the_user_id ";
                               $select_user_query=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_user_query))
                                {
                                    $user_id=$row['user_id'];
                                    $username=$row['username'];
                                    $user_firstname=$row['user_firstname'];
                                    $user_lastname=$row['user_lastname'];
                                    $user_password=$row['user_password'];
                                    $user_gender=$row['user_gender'];
                                    $user_email=$row['user_email'];
                                    $user_contact_no=$row['user_contact_no'];
                                    $user_role=$row['user_role'];

                                }

                            }

                            if(isset($_POST['edit_user']))
                            {

                                $user_firstname=$_POST['user_firstname'];
                                $user_lastname=$_POST['user_lastname'];
                                $user_role=$_POST['user_role'];
                                $username=$_POST['username'];
                                $user_email=$_POST['user_email'];
                                $user_password=$_POST['user_password'];
                                $user_gender=$_POST['user_gender'];
                                $user_email=$_POST['user_email'];
                                $user_contact_no=$_POST['user_contact_no'];

                           
                                 $query="UPDATE users SET ";
                                 $query.="user_firstname='{$user_firstname}', ";
                                 $query.="user_lastname='{$user_lastname}', ";
                                 $query.="user_gender='{$user_gender}', ";
                                 $query.="username='{$username}', ";
                                 $query.="user_password='{$user_password}', ";
                                 $query.="user_email='{$user_email}', ";
                                 $query.="user_contact_no='{$user_contact_no}', ";
                                 $query.="user_role='{$user_role}' ";
                                
                                 $query.="WHERE user_id={$the_user_id}";

                                $edit_user_query=mysqli_query($connection,$query);
                                if(!$edit_user_query)
                                {
                                    die('QUARY FAILED'.mysqli_error($connection));
                                }
                            }

                            ?>

                  <form action="" method="post" enctype="multipart/form-data">

                             <div class="form-group">
                            <label for="title">Firstname</label>
                                <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="user_firstname">
                            </div>

                                <div class="form-group">
                            <label for="post_status">Lastname</label>
                                <input type="text" value="<?php echo $user_lastname?>" class="form-control" name="user_lastname">
                            </div>   
                                <div class="form-group">

                                    <select name="user_role" id="">
                                        <option value="subscriber"><?php echo $user_role?></option>
                                        <?php
                                        if($user_role=='admin')
                                        {
                                            echo "<option value='subscriber'>Subscriber</option>";
                                        }
                                       else
                                       {
                                           echo "<option value='admin'>Admin</option>";
                                       }
                                        ?>

                                    </select>
                            </div>


                                <div class="form-group">
                            <label for="username">Username</label>
                                <input type="text" value="<?php echo $username?>" class="form-control" name="username">
                            </div>

                            <div class="form-group">
                            <label for="user_email">Email</label>
                                    <input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
                            </div>
                            <div class="form-group">
                            <label for="post_content">Password</label>
                                    <input type="password" value="<?php echo $user_password?>" class="form-control" name="user_password">
                            </div>
                             <div class="form-group">
                            <label for="post_content">Contact No</label>
                                    <input type="text" value="<?php echo $user_contact_no?>" class="form-control" name="user_contact_no">
                            </div>
                             
                            <div class="form-group">

                                     <select name="user_gender" id="">
                                        <option value="Male"><?php echo $user_gender?></option>
                                        <?php
                                        if($user_role=='Female')
                                        {
                                            echo "<option value='Male'>Male</option>";
                                        }
                                       else
                                       {
                                           echo "<option value='Female'>Female</option>";
                                       }
                                        ?>

                                    </select>
                            </div>
                                <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="edit_user" value= "Update User">
                                </div>
                            </form>


                        
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
                       
 
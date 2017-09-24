<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>
<?php
if(isset($_SESSION['user_id']))
{
    echo $_SESSION['user_id'];
}
?>
<?php
     if(isset($_GET['pid']))
     {
       $the_product_details_id=$_GET['pid'];
     }
        $query="SELECT * FROM product WHERE product_id='$the_product_details_id' ";
        $select_all_product=mysqli_query($connection,$query);
     
     while($row=mysqli_fetch_array($select_all_product))
        {
         $product_id=$row['product_id'];
         $product_category_id=$row['product_category_id'];
         $product_brand_id=$row['product_brand_id'];
         $product_title=$row['product_title'];
         $product_price=$row['product_price'];
         $product_description=$row['product_description'];
         $product_image=$row['product_image'];
        
        }


?>
    


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="sidebar.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
      <script src="main.js"></script>
      <style>
          table tr td{
              padding: 10px;
          }
      </style>
  </head>
  <body>
      
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Watch Store</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="profile.php">Home</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">About Us</a></li>
    
    </ul>
      <form class="navbar-form navbar-left" action="search.php" method="post">
      <div class="form-group">
        <input style="width:300px;" type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
         
        <div class="dropdown-menu" style="width:400px;">
            <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                <div class="col-md-3">Sl. No</div>
                    <div class="col-md-3">Product Image</div>
                    <div class="col-md-3">Product Name</div>
                    <div class="col-md-3">Price IN  $</div>
                </div>
                </div>
                <div class="panel-body">
                    <div id="cart_product">   
                        
                    </div>
            
        
                    </div>
                </div>
                <div class="panel-footer"></div>
            
        
            </div>
        </li>
         
      <!--<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
   <!--   <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        -->
        
        
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
                            <a href="cart.php" style="text-decoration:none;color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</span></a>
                        </li>
                         <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        
                        
                    </ul>
                </li>
                
    </ul>
  </div>
</nav> 
     
   
      <p><br></p>
            <p><br></p>
            <p><br></p>
      <div class="container-fluid">
      
      <div class="row">
        
          <div class="col-md-2"></div>
          <div class="col-md-8">
          <div class="panel panel-default">
              
              <div class="panel-heading">
              </div>
              <div class="panel-body">
                  <h1>Product Details</h1>
                  <hr/>
                  <div class="row">
                  <div class="col-md-6">
                      <img src='img/<?php echo $product_image?>' class="img-thumbnail" height="400px" width="200px">
                      
                      
                      </div>
                       <div class="col-md-6">
                      <table>
                           
                        <tr><td>Product Name</td><td><b><?php echo $product_title;?></b></td></tr>   
                          <tr><td>Product Price</td><td><b><?php echo $product_price.'$';?></b></td></tr>
                          <?php
                            $query="SELECT * FROM brands WHERE brand_id={$product_brand_id}";
                                   $select_categories_id=mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_assoc($select_categories_id))
                                   {
                                       $brand_id=$row['brand_id'];
                                       $brand_title=$row['brand_title'];
                                       
                                  
                                       echo "<tr><td>Product Brand</td><td><b>{$brand_title}</b></td></tr>   ";
                                   }
                          ?>
                          
                        <tr><td>Quantity</td><td><b>3</b></td></tr>
                          <tr><td>Description</td><td><b><?php echo  $product_description?></b></td></tr>  
                          <tr><td> <button pid='<?php echo $product_id;?>' style='float:right;' class='btn btn-danger' id='product'>Add to Cart</button></td></tr>
                             
                     
                        </table>
                      
                      </div>
                  
                  </div>
              </div>
              
              <div class="panel-footer">
              </div>
              
              </div>
          
          
          </div>
          <div class="col-md-2"></div>
          </div>
      </div>
  </body>
       
</html>
 
<?php include "db.php";?>

<?php ob_start();?>

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
         $product_qty=$row['product_qty'];
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
    <title>eHut</title>

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
      <a class="navbar-brand" href="index.php">ehut</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
      <li><a href="about_us.php">About Us</a></li>
    
    </ul>
      <form class="navbar-form navbar-left" action="search.php" method="post">
      <div class="form-group">
        <input style="width:300px;" type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
   
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
                          
                        <tr><td>Quantity</td><td><b><?php echo $product_qty;?></b></td></tr>
                          <tr><td>Description</td><td><b><?php echo  $product_description?></b></td></tr>  
                          
                          <tr><td><a href="register1.php" style='float:right;' class='btn btn-danger'>Add to Cart</a></td></tr>
                             
                     
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
 
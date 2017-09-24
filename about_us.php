<?php include "db.php";?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>eHut</title>

    <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="footer.css">
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
      
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">eHut</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="about_us.php">About Us</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
       
    </ul>
        <form class="navbar-form navbar-left" action="search1.php" method="post">
      <div class="form-group">
        <input style="width:300px;" type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
     
    <ul class="nav navbar-nav navbar-right">
        <li><!--<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span class="badge">0</span></a>-->
         
        <div class="dropdown-menu" style="width:400px;">
            <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                <div class="col-md-3">Sl. No</div>
                    <div class="col-md-3">Product Image</div>
                    <div class="col-md-3">Product Name</div>
                    <div class="col-md-3">Price IN  $</div>
                
                </div>
                <div class="panel-body"></div>
                <div class="panel-footer"></div>
            
            </div>
            </div>
        </li>
          
           <li><a href="login1.php"><span class="glyphicon glyphicon-admin"></span>Admin Login</a></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
        
        
         <!--<li class="dropdown">
             
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>-->
                
    </ul>
  </div>
</nav> 
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <!--<p><br></p>-->
      <div class="container-fluid">
      
      <div class="row">
      <div style="padding:30px;">
        <center><h1>About eHut</h1></center>
          <p style="margin-right:30px;">
              

ehut.com is the ultimate online shopping destination for Bangladesh offering completely hassle-free shopping experience through secure and trusted gateways. We offer you trendy and reliable shopping with all your favorite brands and more. Now shopping is easier, faster and always joyous. We help you make the right choice here.

ehut.com has been launched in February 2013. It is an initiative of the leading IT firm Splendor IT. PriyoShop showcases products from all categories such as clothing, footwear, jewellery, accessories, electronics, appliance, books, restaurants, health & beauty, and still counting! Our collection combines the latest in fashion trends as well as the all-time favorites. Our products are exclusively selected for you. We, at PriyoShop, have all that you need under one umbrella.

In tune with the vision Digital Bangladesh, PriyoShop.com opens the doorway for everybody to shop over the Internet. We constantly update with lot of new products, services and special offers. We provide on-time delivery of products and quick resolution of any concerns.

We provide our customers with memorable online shopping experience. Our dedicated PriyoShop quality assurance team works round the clock to personally make sure the right packages reach on time. You can choose whatever you like. We deliver it right at your address across Bangladesh. Our services are at your doorsteps all the time. Get the best products with the best online shopping experience every time. You will enjoy online shopping here!
</div>
          </p>
          <div style="padding:30px">
          <center><h1>What we do?</h1></center>
          <p>
              

ehut.com is the ultimate online shopping destination for Bangladesh offering completely hassle-free shopping experience through secure and trusted gateways. We offer you trendy and reliable shopping with all your favorite brands and more. Now shopping is easier, faster and always joyous. We help you make the right choice here.

ehut.com has been launched in February 2013. It is an initiative of the leading IT firm Splendor IT. PriyoShop showcases products from all categories such as clothing, footwear, jewellery, accessories, electronics, appliance, books, restaurants, health & beauty, and still counting! Our collection combines the latest in fashion trends as well as the all-time favorites. Our products are exclusively selected for you. We, at PriyoShop, have all that you need under one umbrella.

In tune with the vision Digital Bangladesh, PriyoShop.com opens the doorway for everybody to shop over the Internet. We constantly update with lot of new products, services and special offers. We provide on-time delivery of products and quick resolution of any concerns.

We provide our customers with memorable online shopping experience. Our dedicated PriyoShop quality assurance team works round the clock to personally make sure the right packages reach on time. You can choose whatever you like. We deliver it right at your address across Bangladesh. Our services are at your doorsteps all the time. Get the best products with the best online shopping experience every time. You will enjoy online shopping here!

          </p>
        
         
       </div>
          <?php include "footer.php";?>
      </div>

      
  </body>
       
</html>
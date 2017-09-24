<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>
<?php
if(isset($_SESSION['user_id']))
{
    echo $_SESSION['user_id'];
   /* echo "<h1>We found</h1>";
     echo "<h1>We found</h1>";
     echo "<h1>We found</h1>";
     echo "<h1>We found</h1>";*/
    
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
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
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
                  <h1>Thank You</h1>
                  <hr/>
                 <p>Hello <?php echo $_SESSION['user_id']?> is successfully completed and your transaction id is xx-xx-xx-xx<br>
                  You can continue shopping<br></p>
              <a href="profile.php" class="btn btn-success btn-lg">Continue Shopping</a>   
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
 
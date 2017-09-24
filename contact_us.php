<?php include "db.php";?>
<?php

global $connection;
if(isset($_POST['submit']))
{   
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
      $date=$row['date'];
    
    $query="INSERT INTO contact_us(name,email,subject,message,date) VALUES('{$name}','{$email}','{$subject}','{$message}',now()) ";
    $contact_query=mysqli_query($connection,$query);
    if(!$contact_query)
    {
        die('QUERY FAILED'.mysqli_error($connection));
    }

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
      <!--<style>
          .jumbotron {
            background: #358CCE;
            color: #FFF;
            border-radius: 0px;
            }
            .jumbotron-sm { padding-top: 24px;
            padding-bottom: 24px; }
            .jumbotron small {
            color: #FFF;
            }
            .h1 small {
            font-size: 24px;
            }
      </style>-->
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">eHut</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
        
    </ul>
        <form class="navbar-form navbar-left" action="search1.php" method="post">
      <div class="form-group">
        <input style="width:300px;" type="text" class="form-control" placeholder="Search" name="search">
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form>
     
    <ul class="nav navbar-nav navbar-right">

           <li><a href="login1.php"><span class="glyphicon glyphicon-admin"></span>Admin Login</a></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
        
        
       
                
    </ul>
  </div>
</nav> 
      <body>
          <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" name="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</input>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>eHut Panel</strong><br>
                Banasree B block<br>
                Road No 9 House No 67 Dhaka 1212<br>
                <abbr title="Phone">
                    P:</abbr>
               +8801675321510
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">kazi22@gmail.com</a>
            </address>
            </form>
        </div>
    </div>
</div>

     
      
  </body>
       
</html>
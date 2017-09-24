<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>


<?php
 
if(isset($_POST['login_user']))
 {
    $username=$_POST['username'];
    $user_password=$_POST['user_password'];
    
    $username=mysqli_real_escape_string($connection,$username);
    $user_password=mysqli_real_escape_string($connection,$user_password);
    $query="SELECT * FROM users WHERE username='{$username}' ";
    $select_user_query=mysqli_query($connection,$query);
    if(!$select_user_query)
    {
        die("QUERY FAILED".mysqli_error($connection));
    }
    while($row=mysqli_fetch_array($select_user_query))
    {
         $db_user_id=$row['user_id'];
         $db_username=$row['username']; 
         $db_user_password=$row['user_password']; 
         $db_user_firstname=$row['user_firstname']; 
         $db_user_lastname=$row['user_lastname']; 
         $db_username=$row['username']; 
         $db_user_role=$row['user_role'];
    }
    if($username!==$db_username&&$user_password!==$db_user_password)
    {
        
        header("Location:login1.php");
        
        
    }
    else if($username===$db_username&&$user_password===$db_user_password)
    {
        $_SESSION['user_id']=$db_user_id;
        $_SESSION['username']=$db_username;
        $_SESSION['user_password']=$db_user_password;
        $_SESSION['user_role']=$db_user_role;
        
        
         header("Location: admin");
        
    }
   /* else
    {
         header("Location:index.php");
    }*/

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
  </head>
  <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">eHut</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
        
    </ul>
      <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
	 <li class="active"><a href="login1.php"><span class="glyphicon glyphicon-admin"></span>Admin Login</a></li>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
    </ul>
  </div>
</nav> 
      <!--Registraion form-->
       <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Admin Log In</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       
    
                        
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Type Username : kazi123">
                        </div>
                         
                    
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Type Password : 1234">
                        </div>
                        
                        
                        <input type="submit" name="login_user" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log In"><br><br>
                       
                        <div class="form-group">
                          <div class="col-xs-6 col-xs-offset-3">
                          
                              <!--php code start-->
                     
                       <!-- global $query;
                   
                        if($query==true)
                        {
                         echo $message = '<div class="alert alert-success" role="alert">You are logged in now.Go to <a href="profile.php">Home</a></div>';
                        }
                        else
                        {
                          echo ''.mysql_error();
                        }
                       --> 
                        
                        </div>
                        </div>
                        
                       
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>

      
      
      </body>
     
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>
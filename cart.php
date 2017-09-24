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
          .center{
              margin: 0 auto;
              width: 100%;
          }
      </style>
      
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">eHut</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="profile.php">Home</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
    
    </ul>
  
    <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span class="badge">0</span></a>-->
        
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
                      
                         <!--<li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>-->
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        
                        
                    </ul>

             
                   
                    
                </li>
                       
        
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
    <!--  <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
        
        
        
                   
    </ul>
  </div>
</nav> 
      <p><br></p>
      <p><br></p>
      <p><br></p>
      <div class="container-fluid">
          <div class="row">
          
          <div class="col-md-2"></div>
              <div class="col-md-8" id="cart_msg">
              </div>
          
          </div>
      <div class="row">
          <div class="col-md-2"></div> 
          <div class="col-md-8">
          <div class="panel panel-primary">
              <div class="panel-heading">Cart Check Out</div>
              <div class="panel-body">
              <div class="row">
                  
                  <div class="col-md-2"><b>Delete/Update</b></div>
                  <div class="col-md-2"><b>Produt Image</b></div>
                  <div class="col-md-2"><b>Product Name</b></div>
                  <div class="col-md-2"><b>Product Price</b></div>
                  <div class="col-md-2"><b>Quantity</b></div>
                  <div class="col-md-2"><b>Price</b></div>
                  </div>
                  
                   <div id="cart_checkout">
                  
                  </div>
      
           
         
                  
              </div>
              
              <div class="panel-footer"></div>
              
              
              </div>
          
          
          
          
          </div>
          <div class="col-md-2"></div>
      <p><br></p>
      <p><br></p>
      <p><br></p>
          <?php
          if(isset($_POST['submit']))
          {
              global $connection;
                $u_address=$_POST['u_address'];
                $first_name=$_POST['first_name'];
                $last_name=$_POST['last_name'];
                $email=$_POST['email'];
                $mobile_no=$_POST['mobile_no'];
                $country=$_POST['country'];
                $city=$_POST['city'];
                $pincode=$_POST['pincode'];
                $date=date('d-m-y');
              $query="INSERT INTO user_address(u_address,first_name,last_name,email,mobile_no,country,city,pincode,date) VALUES('{$u_address}','{$first_name}','{$last_name}','{$email}','{$mobile_no}','{$country}','{$city}','{$pincode}',now()) ";
              $insert_address=mysqli_query($connection,$query);
              if(!$insert_address)
              {
                  die('QUARY FAILED'.mysqli_error($connection));
              }
              if($insert_address)
              {
                  $msg="Informaton Submitted";
              }
              
            
           
          }
          else{
              $msg='';
          }
          
          ?>
          <div class="center">
          <form action="cart.php" method="post" onsubmit="return frm_validation();">
              
                      
                       <div class="col-md-6 shipping">
                                       <p><h4><?php echo "<p style='color:green;'>$msg</p>";?></h4></p>
                                        <h3 class="text-center">Shipping Address</h3>

                                        <hr>
                                              <div class="col-xs-6 col-sm-6 col-md-6">
                                                 <div class="form-group">
                                                     <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" >
                                                      <span id="name_error" style="color:red"></span>
                                                </div>
                                 </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                        <span id="name_error1" style="color:red"></span>
                                    </div>
                                </div>

                                          <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                            <input type="text" name="email" id="user_email" class="form-control input-sm" placeholder="Email id">
                                    <span id="name_error2" style="color:red"></span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="mobile_no" id="user_contact_no" class="form-control input-sm" placeholder="Mobile no">
                                         <span id="name_error3" style="color:red"></span>
                                        
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                            <textarea class="form-control" name="u_address" id="address" placeholder="Write Your Address">                               
                                            </textarea>
                                         <span id="name_error4" style="color:red"></span>         
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                            <input type="text" name="country" id="country" class="form-control input-sm" placeholder="country">
                                         <span id="name_error5" style="color:red"></span>         
                                    </div>
                                </div>
                                   <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                            <input type="text" name="city" id="city" class="form-control input-sm" placeholder="city">
                                         <span id="name_error6" style="color:red"></span>         
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="pincode" id="postalcode" class="form-control input-sm" placeholder="postalcode">
                                         <span id="name_error7" style="color:red"></span>      
                                    </div>
                                </div>
                            <input type="submit" class="btn btn-primary col-md-6" name="submit" value="Submit">
               <p><br></p>
      <p><br></p>
      <p><br></p>
      <p><br></p>
                            
          
          </form>
             
              </div> 
          
          </div>
      
      </div>
     
    </body>
    <p><br></p>
      <p><br></p>
      <p><br></p><p><br></p>
      <p><br></p>
      <p><br></p><p><br></p>
      <p><br></p>
      <p><br></p>
      <script>
      
          function frm_validation(){
	var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var user_email = document.getElementById("user_email").value;
    var user_contact_no = document.getElementById("user_contact_no").value;
    var address = document.getElementById("address").value;
    var country = document.getElementById("country").value;
    var city = document.getElementById("city").value;          
    var postalcode = document.getElementById("postalcode").value;          
    if(first_name==""){
     document.getElementById("name_error").innerHTML="Please Enter your first name";
	 document.getElementById("first_name").focus();
	 return false;
	}
    if(last_name==""){
     document.getElementById("name_error1").innerHTML="Please Enter your last name";
	 document.getElementById("last_name").focus();
	 return false;
	}
    	if(user_email.indexOf("@") < 3 || user_email.indexOf(" ") >= 0){
            
            document.getElementById("name_error2").innerHTML="Please Enter your valid email";
	        document.getElementById("user_email").focus();
	        return false;
        }
              
        if(user_contact_no=="" || user_contact_no.length < 11 || isNaN(user_contact_no)){

     document.getElementById("name_error3").innerHTML="Enter al least 11 digit";
	 document.getElementById("user_contact_no").focus();
	 return false;
	}
       if(address==""){
     document.getElementById("name_error4").innerHTML="Please Enter your your address";
	 document.getElementById("address").focus();
	 return false;
	}
     if(country==""){
     document.getElementById("name_error5").innerHTML="Please Enter Country name";
	 document.getElementById("country").focus();
	 return false;
	}
     
       if(city==""){
     document.getElementById("name_error6").innerHTML="Please Enter City name";
	 document.getElementById("city").focus();
	 return false;
	}
        if(city==""){
     document.getElementById("name_error6").innerHTML="Please Enter City name";
	 document.getElementById("city").focus();
	 return false;
	}
    if(postalcode==""){
     document.getElementById("name_error7").innerHTML="Please Enter Postal Code";
	 document.getElementById("postalcode").focus();
	 return false;
	}
     
          }
          
      </script>
</html>
    
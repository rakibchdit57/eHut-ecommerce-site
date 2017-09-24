<?php include "db.php"?>
<?php
    
    if(isset($_POST['create_user']))
    {
    $user_firstname=$_POST['user_firstname'];
    
    $user_lastname=$_POST['user_lastname'];
    
    $user_gender=$_POST['user_gender'];
    
    $username=$_POST['username'];
    
    $user_password=$_POST['user_password'];
    
     $user_email=$_POST['user_email'];
    
    $user_contact_no=$_POST['user_contact_no'];
    
    

   /* $post_comment_count=4;*/
    
    /*move_uploaded_file($post_image_temp,"../images/$post_image");*/
    
    $query="INSERT INTO users(user_firstname,user_lastname,user_gender,username,user_password,user_email,user_contact_no,user_role) VALUES('{$user_firstname}','{$user_lastname}','{$user_gender}','{$username}','{$user_password}','{$user_email}','{$user_contact_no}','subscriber') "; 
    
    $create_users=mysqli_query($connection,$query);
    
     if(!$create_users)
    {
        die("QUERY FAILED.".mysqli_error($connection));
    } 
   header('Location: login.php');
   
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
      <a class="navbar-brand" href="index.php">Gorgious Watch</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="about_us.php">About Us</a></li>
      <li><a href="contact_us.php">Contact Us</a></li>
        
    </ul>
      
    <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
                <h1>You need to Sign Up first.Please Sign Up..</h1>
                    <form method="post" action="" onsubmit="return frm_validation();">
		
			
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="user_firstname" id="user_firstname" > 
					 <span id="name_error" style="color:red"></span>
				</div>
                        
                	<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="user_lastname" id="user_lastname" > 
					 <span id="name_error1" style="color:red"></span>
				</div>
                                      
                        <div class="form-group">
                            <label for="gender">Gender</label>
                               <select name="user_gender" class="form-control selectpicker">
                               <option value="">Select your Gender</option>
                               <option>Male</option>
                               <option>Female</option>
      
                            </select>     
                        </div>
                        
                        <div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" id="username" > 
					 <span id="name_error3" style="color:red"></span>
				</div>
                        
                         <div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="user_password" id="user_password" > 
					 <span id="name_error4" style="color:red"></span>
				</div>
                        
                 <div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="user_email" id="user_email" > 
					 <span id="name_error5" style="color:red"></span>
				</div>
                        
                    <div class="form-group">
					<label>User Contact No</label>
					<input type="text" class="form-control" name="user_contact_no" id="user_contact_no" > 
					 <span id="name_error6" style="color:red"></span>
				</div>
                        
                        
			
			<input type="submit" class="btn btn-custom btn-lg btn-block" name="create_user" value="Sign Up">



		<div class="col-lg-6 col-md-6 col-sm-6">
		
				
			
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
      <script type="text/javascript">
function frm_validation(){
	var user_firstname = document.getElementById("user_firstname").value;
    var user_lastname = document.getElementById("user_lastname").value;
    var username = document.getElementById("username").value;
     var user_password = document.getElementById("user_password").value;
       var user_email = document.getElementById("user_email").value;

    var user_email = document.getElementById("user_email").value;

    var user_contact_no=document.getElementById("user_contact_no").value;
	if(user_firstname==""){

    	 document.getElementById("name_error").innerHTML="Please Enter your first name";
	 document.getElementById("user_firstname").focus();
	 return false;
	}
    if(user_lastname==""){

    	 document.getElementById("name_error1").innerHTML="Please Enter your last name";
	 document.getElementById("user_lastname").focus();
	 return false;
	}
    if(username==""){

    	 document.getElementById("name_error3").innerHTML="Please Enter your user name";
	 document.getElementById("username").focus();
	 return false;
	}
        if(user_password==""){

    	 document.getElementById("name_error4").innerHTML="Please Enter your password";
	 document.getElementById("user_password").focus();
	 return false;
	}
  
    	if(user_email.indexOf("@") < 2 || user_email.indexOf(" ") >= 0){
	
       document.getElementById("name_error5").innerHTML="Please Enter your valid email";
	 document.getElementById("user_email").focus();
	 return false;
	}
    
    
    
	if(user_contact_no=="" || user_contact_no.length < 11 || isNaN(user_contact_no)){

         document.getElementById("name_error6").innerHTML="Please Enter your valid contact no";
	 document.getElementById("user_contact_no").focus();
	 return false;
	}



  }

  

</script>
</html>
<?php if(session_start()){
  session_destroy();
}session_start();
include_once('connection.php');
include_once('helper.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Logo Here</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About US</a></li> 
        <li><a href="#">Contact Us</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
          
           <div class="row" style="padding-top :-20px;">
             
               <div class="col-xl-8" style="padding-top :8% ; padding-left:20%; padding-right:20%;">
               
                   <form method="post">
                   <h1 >Enter Your Credentials</h1><br>
                   <input class="form-control" type="email" name="email" placeholder="Email" value="<?php  if(isset($_POST["user"])) echo $email; ?>" /> 
                    <br>   
                   
                 <?php 
                  
                   if(isset($_POST["btn"]) =="Login" ){
                       $email = $_POST["email"];
                        
                       $p = "/^[a-zA-Z]+[1][4-6]\-[a-zA-z]+\-[0-9]+@lgu\.edu\.pk$/";
                     if( preg_match($p , $email)){
                        
                         success("match Found");
                         $_SESSION['email'] = $email;
                         header("Location: index.php");
                         
                         
                     }else{
                       
                         error("Email did not match");
                     }
                   }
                   ?>
        <!--[a-zA-Z]+[0-9]+\-[a-zA-z]+\-[0-9]+@[l][g][u]\.[e][d][u]\.[p][k]-->
                   
                 <button type="submit" class="btn btn-default" name="btn" >Login</button>
                     
             </form>
                </div>
           </div>
            
        </div>
        
</body>
</html>


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
                   <input class="form-control" type="email" name="email" placeholder="Email" value="<?php  if(isset($_POST["email"])) echo $_POST["email"]; ?>" /> 
                    <br> 
                        <input class="form-control" type="password" name="pass" placeholder="Password" value="" /> 
                     <br>
                 <?php 
                  
                   if(isset($_POST["btn"]) =="Login" ){
                       $email = $_POST["email"];
                        $pass =  $_POST['pass'];
                       $p = "/^[a-zA-Z]+[1][2-6]\-[a-zA-z]+\-[0-9]+@lgu\.edu\.pk$/";   // abc12-abc-121@lgu.edu.pk
                                                                                       // fa14-bscs-47@lgu.edu.pk
                     if( preg_match($p , $email)){
                        
                         $query = "select * from students where email = '".$email."' and pass = '".$pass."' and checked='1'";
                         //echo $query;
                         $query_for_unverified = "select * from students where email = '".$email."' and pass = '".$pass."' and checked='0'";
                         $result_for_unverified  = @mysql_query($query_for_unverified);
                         $num_rows_of_unverified =  @mysql_num_rows($result_for_unverified);
                         if($num_rows_of_unverified == 1 ){
                            warning("Please verify Account by visiting link in email");
                         }else{
                         $result  = @mysql_query($query);
                        $rows =  @mysql_num_rows($result);
                         //echo $rows;    
                         if($rows > 0 && $rows != 1){
                             error('Wrong Credentials');
                         }else if($rows == 1){
                         $_SESSION['email'] = $email;
                         $_SESSION['pass'] =  $pass;
                          header("Location: index.php");
                         }else{
                            error('Wrong Credentials'); 
                         }
                         }
                         
                     }else{
                       
                         error("Email Pattern did not match");
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


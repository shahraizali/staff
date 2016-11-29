<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
        <?php include_once("connection.php");?>
        <form name="submit" method="post" >
            
         Select Semester
            <select  class="form-control" name="sem_selected">
                <?php 
                    $query =  "Select sem_no from semesters;";
                    $result =  mysql_query($query);
                    echo "";
                    while( $sem =  mysql_fetch_array($result)){
                        echo " <option>".$sem[0]."</option>";

                    }
                    ?>
            </select>
            <br>
            <button class="btn btn-success" name="sem_sub" type="submit">Selected</button>
            <br><br>
            <?php
                
                if(isset($_POST["sem_sub"])){
                   echo "Select Section";
                    $sem_id = $_POST["sem_selected"];
                    $_SESSION["sem"] =  $sem_id;
                    $query =  "select sec_id from sem_sec where sem_id ='".$sem_id."' ";
                    $result =  mysql_query($query);
                    echo "<select name ='sec' class='form-control'>";
                    while($row  =  mysql_fetch_array($result)){
                        $newQ =  "select name from sections where id = '".$row[0]."'";
                        $r = mysql_query($newQ);
                        $name =  mysql_fetch_array($r);
                        echo "<option>". $name[0]."</option>";
                    }
                    echo "</select>";
                     echo '<br>
                     <button class="btn btn-success" type="submit" name = "section">Selected</button>';    
                }
               
                if(isset($_POST['section'])){
                    $_SESSION["sec"] =  $_POST['sec'];
                     
                   
                    header("Location: new.php");
                }
            
            ?>
            
           
            
        </form>
    </div>
    
    
    <!-- Page Content -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<!--

    This page which will be displayed after user is logged in other wise redirected to login.php
    
    authentication is done in header.php file 

-->
<style>
    #pic{
        border:3px solid black;
        width:200px;
        height: 220px;
        border-radius: 30px;
        background: url(images/logo.jpg);
        background-size: cover;
        background-repeat: no-repeat;
            
    }
    #text{
        font-size: 18px;
        font-weight: bold;
        
    }
</style>
<?php  include_once("header.php");
        include_once("connection.php");

    $q = "select * from students where email = '".$_SESSION['email']."' and pass = '".$_SESSION['pass']."' and  checked = '1' ";
    $res = mysql_query($q);
    $user =  mysql_fetch_assoc($res);

    $name=     $user['std_name'];
    $dep_id =     $user['dep_id'];
    $deg_id =     $user['deg_id'];
    $email =     $user['email'];
    $sess_id  =  $user['sess_id'];
    $sec_id  = $user['sec_no'];
?>

    <div class="container">
        
        <div class="row" style="padding-top :20px;">
             
            <div class="col-md-3" >
             
                    <div id='pic' class="glyphicon glyphicon-user"></div>  
                    
            </div> 
            <div class="col-md-9" >
             
                    
                <span id='text'>Name: </span>  
                <span id='text'><?= strtoupper($name)?></span>  
                <br>
                <span id='text'>Email: </span>
                <span id='text'><?= $email?></span> 
                <br>
                <span id='text'>Department: </span>
                <span id='text'><?=getDepName($dep_id)[0]?></span>  
                <br>
                <span id='text'>Degree </span>
                <span id='text'><?= strtoupper(getDegName($deg_id)[0])?></span>  
                <br>
                <span id='text'>Session: </span>
                <span id='text'><?= strtoupper(getSessName($sess_id)[0])?></span>
                <br>
                <span id='text'>Section: </span>
                <span id='text'><?= strtoupper(getSectionName($sec_id)[0])?></span>  
                
                    
            </div> 
        </div>
        
        <div class="row" >
           <div  class="col-md-6" style="padding-top:30px; margin-left: 80px; " >
             
               <h2>Subjects:</h2>
                <?php
                      $q  = "select * from sec_subs where sem_sec_id =  (select   id from sem_sec where  sem_id = '".$sess_id."' and sec_id= '".$sec_id."' and deg_id =  '".$deg_id."'  )";
                   
                    $r =     mysql_query($q);
                   ;
                  
                   ?>
               <select class="form-control">
                  <?php
                        while(  $subjects =    mysql_fetch_assoc($r)){
                                echo "<option >".strtoupper(getSubName($subjects['sub_id'])['code'])."  ".strtoupper(getSubName($subjects['sub_id'])['name'])."     &nbsp;&nbsp; BY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".strtoupper(getStaffName($subjects['staff_id'])[0])." </span></option> ";
                        }
                   ?>
                            
               </select>
               <br>
               <button class='btn btn-default'>Select</button>
            </div> 
        </div>
    </div>
    
    
    <!-- Page Content -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

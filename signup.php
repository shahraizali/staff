<?php
   include_once("header2.php");
   $em_correct =  false;
   
$name_error =  false;

?>
<div class="container">
          
           <div class="row" style="padding-top :-20px;">
             
               <div class="col-xl-8" style="padding-left:20%; padding-right:20%;">
               
                   <form method="post">
                      
                      <?php 
                  $error_show = false;   
                  $em_correct = false;// fro showing error in right place
                   if(isset($_POST["btn"])){
                       $email = mysql_real_escape_string($_POST["email"]);
                        
                       $p = "/^[a-zA-Z]+[1][4-6]\-[a-zA-z]+\-[0-9]+@lgu\.edu\.pk$/";
                     if( preg_match($p , $email)){
                        
                         //success("match Found");
                         $_SESSION['email'] = $email;
                           $em_correct = true;
                           $data['email'] =   $email;
                         
                     }else{
                       $error_show =  true;
                        
                     }
                   }
                   ?>
                      
                   <h1 >Enter Your Credentials</h1><br>
                       Email
                   <input class="form-control" type="email" pattern="[a-zA-Z]+[1][4-6]\-[a-zA-z]+\-[0-9]+@lgu\.edu\.pk" name="email" placeholder="Email" value="<?php  if(isset($_SESSION["email"])){ echo $_SESSION["email"]; }?>" /> 
                    <br>   
                   
                    <?php if($error_show) error("Email did not match");?>
        <!--[a-zA-Z]+[0-9]+\-[a-zA-z]+\-[0-9]+@[l][g][u]\.[e][d][u]\.[p][k]-->
                  
                  
                   <!-- Enter Name -->
            
               <?php
                $name_error =  false;
                  if (isset($_POST['btn'])){
                    $name=  mysql_real_escape_string($_POST['Name']);
                    
                     if($name == '' || empty($name))
                     {
                        $name_error = true;
                        
                     }else{
                         $data['name'] = $name;
                     $_SESSION['name'] =  $name;
                     }
                  }
                  
               ?>
                       Name
                <input class="form-control" type="text" name="Name" pattern="[a-zA-Z\s]+" placeholder="Full Name" value="<?php  if(isset($_SESSION["name"])){ echo $_SESSION["name"]; }?>" /> 
                <br>  
                <?php 
                  if($name_error == true){ error("Empty nmae"); }
                ?>
                
                   <button type="submit" class="btn btn-default" name="btn" >Next</button>
                   
                     <?php 
         
            
      if(isset($_SESSION['email']) && isset($_SESSION['name']) ){
             if(!isset($_SESSION['sem']) || !isset($_SESSION['sec']) && $em_correct == true){
            ?>      
             <br>
         Select Semester
            <select  class="form-control" name="sem_selected">
                <?php 
                    $query =  "Select sem_no from semesters;";
                    $result =  mysql_query($query);
                    echo "";
                  
                    while( $sem =  mysql_fetch_array($result)){
                            $selected =""; 
                         if(isset($_POST['sem_sub']) || isset($_POST['section'])  || isset($_POST['sub']) ){
                                if( $_POST["sem_selected"] == $sem[0]){
                                  
                                    $selected = "selected";
                                }
                       
                       
                        }
                        echo " <option ".$selected .">".$sem[0]."</option>";

                    }
                    ?>
            </select>
            <br>
            <button class="btn btn-default" name="sem_sub" type="submit">Next</button>
            
            
            
            
            <!-- selecting sections -->
            
            <?php
                
                if(isset($_POST["sem_sub"]) ){
                   echo "<br>Select Section";
                    $sem_id = $_POST["sem_selected"];
                    $_SESSION["sem"] =  $sem_id;
                    $query =  "select sec_id from sem_sec where sem_id ='".$sem_id."' ";
                    $result =  mysql_query($query);
                    echo "<select name ='sec' class='form-control'>";
                    while($row  =  mysql_fetch_array($result)){
                        $name = getSectionName($row[0]);
                         $selected =""; 
                         if(isset($_POST['section']) || isset($_POST['sub'])  ){
                                if( $_POST["sec"] == $name[0]){
                                     $data['sec'] =  mysql_real_escape_string($_POST["sec"]);
                                    $selected = "selected";
                                }
                         }
                        echo "<option ".$selected.">". $name[0]."</option>";
                    }
                    echo "</select>";
                     echo '<br>
                     <button class="btn btn-success" type="submit" name = "section">SignUp</button>';    
                }
            
             
           
            
             }
             
      }
                  // session clearing 
                 echo "&nbsp;<button type='submit' name='unset' class='btn btn-default'>Clear Form</button><br>";
                
                if(isset($_POST['unset'])){
                   
                    unset($_SESSION['sec']);
                    unset($_SESSION['sem']);
                    unset($_SESSION['email']);
                    unset($_SESSION['name']);
                    header("Location: #");
                }
            
             if(isset($_POST['section'])){
              $_SESSION['sec'] =  $_POST['sec'];
            $data =  array(
                  'name' => mysql_real_escape_string($_SESSION["name"]),
                  'email' =>mysql_real_escape_string($_SESSION["email"]),
                  'sem' => mysql_real_escape_string($_SESSION["sem"]),
                  'sec' => mysql_real_escape_string($_SESSION["sec"])
               );
             
               
              header("Location: new.php");
                
                
             }
         
            ?>
            
           
                   
                   
                   
                   
                <!-- -->
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                     
             </form>
                </div>
           </div>
            
        </div>





  
    <!-- Page Content -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

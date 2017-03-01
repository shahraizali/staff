<!--

   Signs up the students

-->



<?php
   include_once("header2.php");
   $em_correct =  false;
   
$name_error =  false;


?>
<div class="container">
          
           <div class="row" style="padding-top :-20px;">
             
                <div class="col-xl-8" style="padding-left:20%; padding-right:20%;">
                 
                   <form method="post">

                               <!-- Enter email -->
                            <?php 
                                $error_show = false;
                                $db_error =  false;
                                $em_correct = false;// fro showing error in right place
                                if(isset($_POST["btn"])){
                                   $email = mysql_real_escape_string($_POST["email"]);

                                   $p = "/^[a-zA-Z]+[1][4-6]\-[a-zA-z]+\-[0-9]+@lgu\.edu\.pk$/";
                                        $test_Q =  "select * from students where email = '".$email."'  ";
                                       $res = mysql_query($test_Q);
                                    $rows =     mysql_num_rows($res);
                                    if($rows >0){
                                        $db_error =  true;
                                    }else{ 


                                         if( preg_match($p , $email)){

                                             //success("match Found");
                                             $_SESSION['email'] = $email;
                                               $em_correct = true;
                                               $data['email'] =   $email;

                                         }else{
                                           $error_show =  true;

                                         }
                                    }
                               }
                            ?>

                            <h1 >Enter Your Credentials</h1><br>


                                   Email
                            <input class="form-control" type="email" pattern="[a-zA-Z]+[1][4-6]\-[a-zA-z]+\-[0-9]+@lgu\.edu\.pk" name="email" placeholder="Email" value="<?php  if(isset($_SESSION["email"])){ echo $_SESSION["email"]; }?>" /> 
                            <br>   

                            <?php if($error_show) error("Email did not match");
                                    if($db_error) error("Email already exist in database!");
                                ?>
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

                                         $skip_dep = false;



                                if(isset($_SESSION['email']) && isset($_SESSION['name']) ){    // true only if correct email and name has entered

                                      // (!isset($_SESSION['sem']) || !isset($_SESSION['sec']) || !isset($_SESSION['fac']) || !isset($_SESSION['dep']))
                                    ?>      
                                             <br>
                                                        <!-- Selecting faculties -->


                                                          Select Department
                                            <select  class="form-control" name="dep_selected">
                                                <?php 
                                                    $query =  "Select id, name from departments;";
                                                    $result =  mysql_query($query);


                                                    while( $fac =  mysql_fetch_array($result)){
                                                      
                                                      
                                                            $selected ="";
                                                            if(isset($_POST['department_selected']) || isset($_POST['section']) ||isset($_POST['sessions'])  || isset($_POST['degree']) ){  
                                                           
                                                                if( strcmp_s($_POST["dep_selected"] ,$fac[1] ) == 0){
                                                                      $_SESSION['dep'] = $_POST['dep_selected'] ;
                                                                  echo "chala";
                                                                    $selected = "selected";
                                                                }


                                                        }
                                                        echo " <option ".$selected .">".$fac[1]."</option>";

                                                    }
                                                    ?>
                                            </select>
                                            <br>
                                            <button class="btn btn-default" name="department_selected" type="submit">Next</button>




                                        <?php

                                         if( isset($_SESSION["dep"])  ){  
                                             
                                        ?>               


                                                       <br>         <!-- Selecting degree -->
                                         Select degree
                                            <select  class="form-control" name="deg_selected">
                                                <?php 
                                                        $dep_id = getDepId($_SESSION['dep']);
                                                    $query =  "Select name from degrees where dep_id = '".$dep_id[0]."';";
                                                    echo "id : ".$dep_id[0];
                                                    $result =  mysql_query($query);
                                                    echo "";

                                                    while( $sem =  mysql_fetch_array($result)){

                                                            $selected =""; 
                                                            if(isset($_POST['degree']) || isset($_POST['sem_sub']) || isset($_POST['section']) ){
                                                                if( strcmp_s($_POST["deg_selected"] , $sem[0]) == 0){
                                                                  $_SESSION["deg"] = $_POST["deg_selected"];
                                                                    $selected = "selected";
                                                                }


                                                        }
                                                        echo " <option ".$selected .">".$sem[0]."</option>";

                                                    }
                                                    ?>
                                            </select>
                                            <br>
                                            <button class="btn btn-default" name="degree" type="submit">Next</button>




                                             <?php
                                             }
                                             if(isset($_SESSION["deg"])  ){  

                                        ?>           


                                          <br>         <!-- Selecting Session -->
                                         Select Session
                                            <select  class="form-control" name="sess_selected">
                                                <?php 

                                                    $query =  "Select name from sessions where deg_id = '".getDegId($_SESSION["deg"])[0]."';";
                                                    $result =  mysql_query($query);
                                                    echo "";

                                                    while( $sem =  mysql_fetch_array($result)){
                                                            $selected =""; 
                                                         if(isset($_POST['sessions']) || isset($_POST['section'])  ){
                                                                if( $_POST["sess_selected"] == $sem[0]){

                                                                    $selected = "selected";
                                                                }


                                                        }
                                                        echo " <option ".$selected .">".$sem[0]."</option>";

                                                    }
                                                    ?>
                                            </select>
                                            <br>
                                            <button class="btn btn-default" name="sessions" type="submit">Next</button>




                                            <!-- selecting sections -->

                                            <?php
                                             }
                                                if(isset($_POST["sessions"]) ){
                                                   echo "<br>Select Section";
                                                    
                                                    $sess_name =   $_POST["sess_selected"];
                                                   $_SESSION["sessions"] =  $sess_name;
                                                   $sess_id =  getSessId($sess_name , $_SESSION['deg'] );
                                                  
                                                    
                                                    $query =  "select sec_id from sem_sec where sem_id ='".$sess_id[0]."' and deg_id='".getDegId($_SESSION["deg"])[0]."' ";
                                                    
                                                    $result =  mysql_query($query);
                                                    echo "<select name ='sec' class='form-control'>";
                                                    while($row  =  mysql_fetch_array($result)){
                                                        $name = getSectionName($row[0]);
                                                         $selected =""; 
                                                         if(isset($_POST['section']) || isset($_POST['sub'])  ){
                                                                if( $_POST["sec"] == $name[0]){
                                                                    $_SESSION['sec'] =  $_POST['sec'];
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
                                      // session clearing 
                                     echo "&nbsp;<button type='submit' name='unset' class='btn btn-default'>Clear Form</button><br>";

                                if(isset($_POST['unset'])){
                                     unset($_SESSION['email']);
                                    unset($_SESSION['name']);
                                    unset($_SESSION['dep']);
                                    unset($_SESSION['deg']);
                                   
                                    unset($_SESSION['sessions']);
                                     unset($_SESSION['sec']);
                                    @header("Location: signup.php");
                                   
                                }

                                if(isset($_POST['section'])){
                                    @$_SESSION['sec'] =  $_POST['sec'];
                                    
                                    if( isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['dep']) && isset($_SESSION['deg']) && isset($_SESSION['sessions']) && isset($_SESSION['sec'])){
                                            

                                           $name =     mysql_real_escape_string($_SESSION["name"]);
                                           $email =   mysql_real_escape_string($_SESSION["email"]);
                                           $dep =    mysql_real_escape_string($_SESSION["dep"]);
                                           $deg =    mysql_real_escape_string($_SESSION["deg"]);
                                           $sess =    mysql_real_escape_string($_SESSION["sessions"]);
                                           $sec =    mysql_real_escape_string($_SESSION["sec"]);
                                           $sess_id =  getSessId($sess ,$deg )[0];
                                           $sec_no =  getSectionNum($sec)[0];
                                            $dep_id =  getDepId($dep)[0];
                                           $deg_id =  getDegId($deg)[0];
                                           $hash =  md5( rand(1, 1000));
                                           $pass =  getRandomString();
                                    $insertion_query = "INSERT INTO students (std_id , std_name, email , pass , sess_id , sec_no , dep_id , deg_id, hash ,  checked)  values ('' , '".$name."' , '".$email."' , '".$pass."' ,'".$sess_id."' ,  '".$sec_no."' , '".$dep_id."'  , '".$deg_id."'  , '".$hash."' , '' )";

                                        $succ  =mysql_query($insertion_query);
                                            if($succ){
                                                
                                               
                                                success("Record entered");

                                                $qq =  "select std_id  from students where email = '".$email."' and hash = '".$hash."'  ";
                                                $res = mysql_query($qq);
                                                $data = mysql_fetch_array($res);
                                                $get_id = $data['std_id'];
                                                // mail to be implemented here 
                                                $urll = "/confirmation.php?hash=".$hash."&user=".$get_id."";
                                                
                                            
                                                //end mail
                                                //unset($_SESSION['email']); except mail as mail is to be used in next page
                                                unset($_SESSION['name']);
                                                unset($_SESSION['dep']);
                                                unset($_SESSION['deg']);
                                                unset($_SESSION['sessions']);
                                                unset($_SESSION['sec']);
                                                @header("Location: mail.php ");
                                                
                                                
                                            }
                                        
                                      
                                     
                            
                                    }else{
                                        error("Some data missing");
                                    }
                                       
                                      }
                         

                            //  header("Location: new.php");


             
                            ?>


                    </form>
                    
                </div>
               
           </div>
            
</div>


<?php
    require("footer.php");
?>
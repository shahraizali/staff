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
                                            <select  class="form-control" name="fac_selected">
                                                <?php 
                                                    $query =  "Select id, name from degrees;";
                                                    $result =  mysql_query($query);


                                                    while( $fac =  mysql_fetch_array($result)){
                                                            $selected ="";
                                                            if(isset($_POST['faculties_selected']) || isset($_POST['section']) ||isset($_POST['sem_sub'])  || isset($_POST['department']) ){  

                                                               // echo $_POST["fac_selected"]." ===".  $fac[1]."=>". ($_POST["fac_selected"] === $fac[1])."<br>";
                                                                if( strcmp_s($_POST["fac_selected"] ,$fac[1] ) == 0){
                                                                      $_SESSION['fac'] = $_POST['fac_selected'] ;
                                                                  echo "chala";
                                                                    $selected = "selected";
                                                                }


                                                        }
                                                        echo " <option ".$selected .">".$fac[1]."</option>";

                                                    }
                                                    ?>
                                            </select>
                                            <br>
                                            <button class="btn btn-default" name="faculties_selected" type="submit">Next</button>




                                        <?php

                                         if(isset($_SESSION["fac"])  ){  

                                        ?>               


                                                       <br>         <!-- Selecting department -->
                                         Select Department
                                            <select  class="form-control" name="dep_selected">
                                                <?php 
                                                        $fac_id = getfacId($_SESSION['fac']);
                                                    $query =  "Select dep_id from faculties_deps where fac_id = '".$fac_id[0]."';";
                                                    echo "id : ".$fac_id[0];
                                                    $result =  mysql_query($query);
                                                    echo "";

                                                    while( $sem =  mysql_fetch_array($result)){

                                                            $selected =""; 
                                                            if(isset($_POST['department']) || isset($_POST['sem_sub']) || isset($_POST['section']) ){
                                                                if( strcmp_s($_POST["dep_selected"] , getDepName($sem[0])[0]) == 0){
                                                                  $_SESSION["dep"] = $_POST["dep_selected"];
                                                                    $selected = "selected";
                                                                }


                                                        }
                                                        echo " <option ".$selected .">".getDepName($sem[0])[0]."</option>";

                                                    }
                                                    ?>
                                            </select>
                                            <br>
                                            <button class="btn btn-default" name="department" type="submit">Next</button>




                                             <?php
                                             }
                                             if(isset($_SESSION["dep"])  ){  

                                        ?>           


                                          <br>         <!-- Selecting semester -->
                                         Select Semester
                                            <select  class="form-control" name="sem_selected">
                                                <?php 

                                                    $query =  "Select sem_no from semesters where dep_id = '".getDepId($_SESSION["dep"])[0]."';";
                                                    $result =  mysql_query($query);
                                                    echo "";

                                                    while( $sem =  mysql_fetch_array($result)){
                                                            $selected =""; 
                                                         if(isset($_POST['sem_sub']) || isset($_POST['section'])  ){
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
                                             }
                                                if(isset($_POST["sem_sub"]) ){
                                                   echo "<br>Select Section";
                                                    $sem_id = $_POST["sem_selected"];
                                                    $_SESSION["sem"] =  $sem_id;
                                                    $query =  "select sec_id from sem_sec where sem_id ='".$sem_id."' and dep_id='".getDepId($_SESSION["dep"])[0]."' ";
                                                   
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

                                    unset($_SESSION['sec']);
                                    unset($_SESSION['sem']);
                                    unset($_SESSION['email']);
                                    unset($_SESSION['name']);
                                    unset($_SESSION['fac']);
                                     unset($_SESSION['dep']);
                                    @header("Location: signup.php");
                                   
                                }

                                if(isset($_POST['section'])){
                                    @$_SESSION['sec'] =  $_POST['sec'];

                                    if( isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['fac']) && isset($_SESSION['dep']) && isset($_SESSION['sem']) && isset($_SESSION['sec'])){
                                            
                                        
                                           $name =     mysql_real_escape_string($_SESSION["name"]);
                                           $email =   mysql_real_escape_string($_SESSION["email"]);
                                           $sem =    mysql_real_escape_string($_SESSION["sem"]);
                                           $sec =    mysql_real_escape_string($_SESSION["sec"]);
                                           $fac =    mysql_real_escape_string($_SESSION["fac"]);
                                            $dep =    mysql_real_escape_string($_SESSION["dep"]);
                                           $sec_no =  getSectionNum($sec)[0];
                                           $dep_id =  getDepId($dep)[0];
                                           $hash =  md5( rand(1, 1000));
                                           $pass =  rand(10000000 , 99999999);
                                    $insertion_query = "INSERT INTO students (std_id , std_name, email , pass ,sem_no ,sec_no , dep_id , hash ,  checked)  values ('' , '".$name."' , '".$email."' , '".$pass."' ,'".$sem."' ,  '".$sec_no."' , '".$dep_id."'  , '".$hash."' , '' )";

                                        $succ  =mysql_query($insertion_query);
                                            if($succ){
                                                success("Record entered");
                                            }else{
                                              echo $insertion_query;
                                                                                          }
                                        // mail to be implemented here 

                                        //end mail
                                            
                                       
                                    }else{
                                        error("Some data missing");
                                    }
                                        unset($_SESSION['sec']);
                                    unset($_SESSION['sem']);
                                    unset($_SESSION['email']);
                                    unset($_SESSION['name']);
                                    unset($_SESSION['fac']);
                                     unset($_SESSION['dep']);
                                      @header("Location: #");
                                      }
                         

                            //  header("Location: new.php");


             
                            ?>


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

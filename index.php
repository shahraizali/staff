<?php 
    include_once("header.php");
?>

    <div class="container">
        <?php include_once("connection.php");?>
        <form name="submit" method="post" >
           
            
            <!-- selecting  semester -->
            
      <?php 
         
            
            if(isset($_SESSION['sub_name']) && isset($_SESSION['sec']) && isset($_SESSION['sem'])){
                
                 echo "<br><br>Select Subjects";
                     
                    echo "<select class='form-control' name='subjects'>";
                    //SELECT sub_id FROM `sec_subs` WHERE sem_id = 5 and sec_id =  2
                                $q = "select sub_id from sec_subs where sem_id = '".$_SESSION["sem"]."' and sec_id ='".getSectionNum($_SESSION["sec"])[0]."'" ;
                            $r =     mysql_query($q);
                                    while( $sub =  mysql_fetch_array($r)){
                                        $selected="";
                                          if(isset($_POST['sub'])  ){
                                              if( $_POST["subjects"] == getSubName($sub[0])[1]){
                                                  $selected = "selected";
                                                }
                                          }  
                                        echo "<option ".$selected.">".getSubName($sub[0])[1]. "</option>";
                                    }
                                echo $q;
                    echo "</select>";
                    echo '<br>
                     <button class="btn btn-success" type="submit" name = "sub">Selected</button>';
                
            }
            
             if(!isset($_SESSION['sub_name']) && !isset($_SESSION['sec']) ){
            ?>      
            
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
            <button class="btn btn-success" name="sem_sub" type="submit">Selected</button>
            <br><br>
            
            
            <!-- selecting sections -->
             
            
            
            <?php
                
                if(isset($_POST["sem_sub"]) ||isset($_POST['section']) || isset($_POST['sub']) ){
                   echo "Select Section";
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
                                    $selected = "selected";
                                }
                         }
                        echo "<option ".$selected.">". $name[0]."</option>";
                    }
                    echo "</select>";
                     echo '<br>
                     <button class="btn btn-success" type="submit" name = "section">Selected</button>';    
                }
            
             
            //selecting subjects
            
            
               
                if(isset($_POST['section']) || isset($_POST['sub'])){
                    $_SESSION["sec"] =  $_POST['sec'];
                       
                    echo "<br><br>Select Subjects";
                     
                    echo "<select class='form-control' name='subjects'>";
                    //SELECT sub_id FROM `sec_subs` WHERE sem_id = 5 and sec_id =  2
                                $q = "select sub_id from sec_subs where sem_id = '".$_SESSION["sem"]."' and sec_id ='".getSectionNum($_SESSION["sec"])[0]."'" ;
                            $r =     mysql_query($q);
                                    while( $sub =  mysql_fetch_array($r)){
                                        $selected="";
                                          if(isset($_POST['sub'])  ){
                                              if( $_POST["subjects"] == getSubName($sub[0])[1]){
                                                  $selected = "selected";
                                                }
                                          }  
                                        echo "<option ".$selected.">".getSubName($sub[0])[1]. "</option>";
                                    }
                                echo $q;
                    echo "</select>";
                    echo '<br>
                     <button class="btn btn-success" type="submit" name = "sub">Selected</button>';
                }
                 
             }else{
                 echo "&nbsp;<button type='submit' name='unset' class='btn'>Change section/semester</button><br>";
                
                if(isset($_POST['unset'])){
                    unset($_SESSION['sub_name']);
                    unset($_SESSION['sec']);
                    unset($_SESSION['sem']);
                    header("Location: #");
                }
             }
            
            if(isset($_POST['sub'])){

                $_SESSION['sub_name'] = $_POST['subjects'];
               // echo $_SESSION['sub_name'];
            header("Location: Questions.php");
            }
            // selecting teacher

            /*     //NO Need to select teacher as we have cornered it  
                if(isset($_POST['sub'])){
                    
                    $SESSION['sub_name'] = $_POST['subjects'];
                    echo "<br><br>Select Your Teacher : ";
                     echo "<select class='form-control' name='subjects'>";
                         $q = "select staff_id from sec_subs where sem_id = '".$_SESSION["sem"]."' and sec_id ='".getSectionNum($_SESSION["sec"])[0]."' and sub_id = '".getSubId($SESSION['sub_name'])[0]."' " ;
                            $r =     mysql_query($q);
                                    while( $sub =  mysql_fetch_array($r)){
                                        echo "<option>".getStaffName($sub[0])[0]. "</option>";
                                    }
                                echo $q;
                    
                    echo "</select>";
                    echo '<br>
                     <button class="btn btn-success" type="submit" name = "teacher">Selected</button>';
                }
                */
            
            ?>
            
           
            
        </form>
    </div>
    
    
    <!-- Page Content -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

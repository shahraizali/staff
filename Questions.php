<?php
    include_once('header.php');
   
?>

        <div class="container">
            <?php
            
                 echo "<br>Semester: ". $_SESSION['sem']; 
                echo "<br>Section: ". $_SESSION['sec']; 
        echo "<br>Subject: ".$_SESSION['sub_name']; 
        
              $q = "select staff_id from sec_subs where sem_id = '".$_SESSION["sem"]."' and sec_id ='".getSectionNum($_SESSION["sec"])[0]."' and sub_id = '".getSubId($_SESSION['sub_name'])[0]."' " ;
                            $r =     mysql_query($q);
                                    $sub =  mysql_fetch_array($r);
                                        echo "<br>Teacher: ".getStaffName($sub[0])[0];
                                    
                              //  echo $q;
                        
        
        
            ?>
            

        </div>

    </body>

</html>
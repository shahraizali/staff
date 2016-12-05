<?php
     include_once("../../helper.php");
    include_once("../../connection.php");

    if(isset($_POST['dep'])){
        $dep = $_POST['dep'];
        $dep_id =  getDepId($dep);
          $q  ="select * from students  where dep_id =  '".$dep_id[0]."'";
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                       echo"<tr id='st'>
                                <td>".$row['std_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['pass']."</td>
                                <td>".$row['sem_no']."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }
}
  if(isset($_POST['dep_sem'])){

              
        $dep_id = getDepId($_POST["dep_sem"]);
        
        $q = "select sem_no from semesters where dep_id ='".$dep_id[0]."'; ";
        $res = mysql_query($q);
        echo "<option>Select Semester</option>";
        while($Sem = mysql_fetch_array($res)){
            echo "<option id='s'>".$Sem[0]."</option>";
            
        }

    }  

     if(isset($_POST['sem_sel']) && isset($_POST['dep_sel'])){

         $dep = $_POST['dep_sel'];
         $sem_id = $_POST['sem_sel'];
        $dep_id =  getDepId($dep);
          $q  ="select * from students  where dep_id =  '".$dep_id[0]."' and sem_no= '".$sem_id."'";
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                       echo"<tr id='st'>
                                <td>".$row['std_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['pass']."</td>
                                <td>".$row['sem_no']."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }


     }




     if(isset($_POST['sem_for_section']) && isset($_POST['dep_for_section']) ){

              
        $dep_id = getDepId($_POST["dep_for_section"]);
        
        $q = "select sec_id from sem_sec where dep_id ='".$dep_id[0]."'  and  sem_id = '".$_POST['sem_for_section']."'; ";
        $res = mysql_query($q);
        echo "<option>Sections</option>";
        while($Sem = mysql_fetch_array($res)){
            echo "<option id='s'>".getSectionName($Sem[0])[0]."</option>";
            
        }

    }  

    if (isset($_POST["simple"])){
                        $q  ="select * from students";
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                       echo"<tr>
                                <td>".$row['std_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['pass']."</td>
                                <td>".$row['sem_no']."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }
    }




     if(isset($_POST['osec_sel']) && isset($_POST['osem_sel']) && isset($_POST['odep_sel']) ){

         $dep = $_POST['odep_sel'];
         $sec = $_POST['osec_sel'];
         $sec_id =  getSectionNum($sec);
         $sem_id = $_POST['osem_sel'];
        $dep_id =  getDepId($dep);
          $q  ="select * from students  where  sec_no = '".$sec_id[0]."' and dep_id = '".$dep_id[0]."' and sem_no= '".$sem_id."' ;";
            
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                       echo"<tr id='st'>
                                <td>".$row['std_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['pass']."</td>
                                <td>".$row['sem_no']."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }


     }


?>
            
            
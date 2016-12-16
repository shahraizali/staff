<?php
     include_once("../../helper.php");
    include_once("../../connection.php");

// SELECT DEPARTMENT

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
                                <td>".getSessName($row['sess_id'])[0]."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".getDegName($row['deg_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }
}

// fill sessions dropdown

  if(isset($_POST['dep_sem'])){

              
        $dep_id = getDepId($_POST["dep_sem"]);
        
        $q = "select name from degrees where dep_id ='".$dep_id[0]."'; ";
        $res = mysql_query($q);
        echo "<option>Select Semester</option>";
        while($Sem = mysql_fetch_array($res)){
            echo "<option id='s'>".$Sem[0]."</option>";
            
        }

    }  


//select session
     if(isset($_POST['deg_sel']) && isset($_POST['dep_sel']) ){

         $dep = $_POST['dep_sel'];
         $deg_id = $_POST['deg_sel'];
        $dep_id =  getDepId($dep);
          $q  ="select * from students  where dep_id =  '".$dep_id[0]."' and deg_id = '".getDegId($deg_id)[0]."'";
        
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                       echo"<tr id='st'>
                               <td>".$row['std_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['pass']."</td>
                                <td>".getSessName($row['sess_id'])[0]."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".getDegName($row['deg_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }


     }

// filling sessions


     if(isset($_POST['deg_for_section']) ){

              
        $deg_id = getDegId($_POST["deg_for_section"]);
        
        $q = "select name from sessions where deg_id ='".$deg_id[0]."'; ";
         echo $q;
        $res = mysql_query($q);
        echo "<option>Select session</option>";
        while($Sem = mysql_fetch_array($res)){
            echo "<option id='s'>".$Sem[0]."</option>";
            
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
                                <td>".getSessName($row['sess_id'])[0]."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".getDegName($row['deg_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }
    }




     if(isset($_POST['secc_sel']) && isset($_POST['degg_sel']) && isset($_POST['depp_sel']) ){

         $dep = $_POST['depp_sel']; // dep
         $sess = $_POST['secc_sel'];  // session
         $deg = $_POST['degg_sel']; // deg
         $sess_id = getSessId($sess , $deg );
         $deg_id = getDegId($deg); 
        $dep_id =  getDepId($dep);
          $q  ="select * from students  where  dep_id = '".$dep_id[0]."' and deg_id = '".$deg_id[0]."' and sess_id= '".$sess_id[0]."' ;";
            
                $result = mysql_query($q);
               
                while( $row =  mysql_fetch_assoc($result) ){
                       echo"<tr id='st'>
                                <td>".$row['std_name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['pass']."</td>
                                <td>".getSessName($row['sess_id'])[0]."</td>
                                <td>".getSectionName($row['sec_no'])[0]."</td>
                                <td>".getDepName($row['dep_id'])[0]."</td>
                                <td>".getDegName($row['deg_id'])[0]."</td>
                                <td>".$row['checked']."</td>
                             </tr>   
                            ";
                    
                }


     }


?>
            
            
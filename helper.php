<!--
    
    All the helper functions are here i.e static queries , randon password generation etc 

-->



<?php

    // random pass generation :-> this is way powerful than md5 type hashes:
        
    function getRandomString(){
    $options = '012$345#678%9ab@cde&fgh*ijk~lmn#opq@rst#uvw$xyz%ABC&DEF*GHI*JKL@MNO#PQR$STU&VWX!YZ';
    $size = strlen($options);
    $String = '';
    for ($i = 0; $i < 10; $i++) {
        $String .= $options[rand(0, $size - 1)];
    }
    return $String;
    }





    function getSectionName($no){
        $newQ =  "select name from sections where id = '".$no."'";
                        $r = mysql_query($newQ);
                        $name =  mysql_fetch_array($r);
        return $name;
    }


    function getSectionNum($n){
        $newQ =  "select id from sections where name  = '".$n."'";

                $r = mysql_query($newQ);
            $r;
        $no =  mysql_fetch_array($r);

        return $no;
    }

    function getSubName($n){
        $newQ =  "select name , des from all_subs where id  = '".$n."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getSubId($n){
        $newQ =  "select id from all_subs where des = '".$n."'";

        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getStaffName($n){
        $newQ =  "select name from staff where id  = '".$n."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getfacId($n){
        $newQ =  "select id from faculties where name  = '".$n."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getDepName($n){
        $newQ =  "select name from departments where id  = '".$n."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getDepId($n){
        $newQ =  "select id from departments where name  = '".$n."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }


     function getDegId($n){
        $newQ =  "select id from degrees where name  = '".$n."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }
 function getDegName($n){
        $newQ =  "select name from degrees where id   = '".$n."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }

     function getSessName($n){
        $newQ =  "select name from sessions where id  = '".$n."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

      function getSessId($n , $d){
          
        $newQ =  "select id from sessions where name  = '".$n."' and deg_id = '".getDegId($d)[0]."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }

    function strcmp_s($f , $s){
        return strcmp( str_replace(' ', '' , $f) ,  str_replace(' ', '' , $s)  );
    }

    //styling messages
function error(  $error ){
       echo '<div style="padding-top :10px;" class="alert alert-danger fade in">
             <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">X</a>
             <strong>Error !  </strong>'.$error.'.</br>
                 </div> ';
}

function warning($error){
                        echo ' <div style="padding-top :10px; " class="alert alert-warning fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong>Warning!   </strong>'.$error.'.
                        </div>';
}

function success($msg){
                             echo '<div style="padding-top :10px;" class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <strong>Congratulations!</strong> '.$msg.'.
                            </div>';
}

// department functionalities

function getDepartments(){
      $q =  "select * from departments";
                $r = mysql_query($q);
                $d = "";
                while( $row = mysql_fetch_assoc($r)){
                   $d .=  "<tr>
                    <td>".$row['name']."</td>
                        <td><form method='post'> <button class='btn btn-danger' name='del_dep' value ='".$row['id']."'>Delete</button> </form></td>
                        <td><button class='btn btn-default' onclick='edit_department(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#department_edit_modal'>Edit</button></td>
                    </tr>";
                }
                return $d;
}


function addDepartment($name){
    $created_date = date("Y-m-d H:i:s");
    $q =  "insert into departments( id , name , created , updated ) values ('' , '".$name."' , '".$created_date."' , '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                    success("New Department has been added");
                }else{
                    error("Something went wrong");
                }
}
function delDepartment($id){
    $q =  "delete from departments where id =  '".$id."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}

function updateDepartment($name , $id){
    

    $q =  "update departments set name =  '".$name."'  where id = '".$id."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Department edited Successfully");
                }else{
                    error("Something went wrong!");
                }
              
}


// degree functionalities


function addDegree($deg_name , $dep_id){
    $created_date = date("Y-m-d H:i:s");
 
 
    $q =  "insert into degrees( id , name , dep_id , created  ) values ('' , '".$deg_name."'  ,'".$dep_id."' ,  '".$created_date."' ) ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Degree has been added");
                }else{
                  
                    error("Something went wrong");
                }
}

function delDegree($id){
    $q =  "delete from degrees where id =  '".$id."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}

function updateDegree($id , $deg_name , $dep_id){
    

    $q =  "update degrees set name =  '".$deg_name."' , dep_id = '".$dep_id."' where id = '".$id."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Degree Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
              
}



// Session functionalities

function addSession( $sess_name , $start , $end , $deg_id){
         $created_date = date("Y-m-d H:i:s");
 
 
    $q =  "insert into sessions( id , name , start , end , deg_id , created  ) values ('' , '".$sess_name."'  ,'".$start."' ,  '".$end."' , '".$deg_id."'  , '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Session has been added");
                }else{
                  
                    error("Something went wrong");
                }
    
}   


function delSession($id){
    $q =  "delete from sessions where id =  '".$id."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}



function updateSession($id , $sess_name , $start , $end , $deg_id){
    

    $q =  "update sessions set name =  '".$sess_name."' , start = '".$start."' , end = '".$end."'  , deg_id = '".$deg_id."' where id = '".$id."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Degree Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
              
}


// staff functionalities


function addStaff( $name , $dep_id){
        
            $created_date = date("Y-m-d H:i:s");
 
 
              $q =  "insert into staff( id , name , dep_id , created  ) values ('' , '".$name."'  ,'".$dep_id."', '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Session has been added");
                }else{
                  
                    error("Something went wrong");
                }
    
}

function delStaff($id){
    $q =  "delete from staff where id =  '".$id."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}


function updateStaff($id , $name , $dep_id){
    

    $q =  "update staff set name =  '".$name."' ,  dep_id = '".$dep_id."' where id = '".$id."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Degree Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
              
}



?>
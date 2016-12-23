<!--
    
    All the helper functions are here i.e static queries , randon password generation etc 
//    _            _                       __                      _    _                    
//   | |          | |                     / _|                    | |  (_)                   
//   | |__    ___ | | _ __    ___  _ __  | |_  _   _  _ __    ___ | |_  _   ___   _ __   ___ 
//   | '_ \  / _ \| || '_ \  / _ \| '__| |  _|| | | || '_ \  / __|| __|| | / _ \ | '_ \ / __|
//   | | | ||  __/| || |_) ||  __/| |    | |  | |_| || | | || (__ | |_ | || (_) || | | |\__ \
//   |_| |_| \___||_|| .__/  \___||_|    |_|   \__,_||_| |_| \___| \__||_| \___/ |_| |_||___/
//                   | |                                                                     
//                   |_|                                                                     
-->



<?php

//     _____        _    _                   
//    / ____|      | |  | |                  
//   | |  __   ___ | |_ | |_  ___  _ __  ___ 
//   | | |_ | / _ \| __|| __|/ _ \| '__|/ __|
//   | |__| ||  __/| |_ | |_|  __/| |   \__ \
//    \_____| \___| \__| \__|\___||_|   |___/
//                                           
//                                               
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
        $newQ =  "select name from sections where id = '".mysql_real_escape_string($no)."'";
                        $r = mysql_query($newQ);
                        $name =  mysql_fetch_array($r);
        return $name;
    }


    function getSectionNum($n){
        $newQ =  "select id from sections where name  = '".mysql_real_escape_string($n)."'";

                $r = mysql_query($newQ);
            $r;
        $no =  mysql_fetch_array($r);

        return $no;
    }

    function getSubName($n){
        $newQ =  "select code , name from all_subs where id  = '".mysql_real_escape_string($n)."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_assoc($r);
        return $no;
    }

    function getSubId($n){
        $newQ =  "select id from all_subs where des = '".mysql_real_escape_string($n)."'";

        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getStaffName($n){
        $newQ =  "select name from staff where id  = '".mysql_real_escape_string($n)."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getfacId($n){
        $newQ =  "select id from faculties where name  = '".mysql_real_escape_string($n)."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getDepName($n){
        $newQ =  "select name from departments where id  = '".mysql_real_escape_string($n)."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

    function getDepId($n){
        $newQ =  "select id from departments where name  = '".mysql_real_escape_string($n)."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }


     function getDegId($n){
        $newQ =  "select id from degrees where name  = '".mysql_real_escape_string($n)."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }
 function getDegName($n){
        $newQ =  "select name from degrees where id   = '".mysql_real_escape_string($n)."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }

     function getSessName($n){
        $newQ =  "select name from sessions where id  = '".mysql_real_escape_string($n)."'";
                        $r = mysql_query($newQ);
                        $no =  mysql_fetch_array($r);
        return $no;
    }

      function getSessId($n , $d){
          
        $newQ =  "select id from sessions where name  = '".mysql_real_escape_string($n)."' and deg_id = '".mysql_real_escape_string(getDegId($d)[0])."'";
        $r = mysql_query($newQ);
        $no =  mysql_fetch_array($r);
        return $no;
    }

    function strcmp_s($f , $s){
        return strcmp( str_replace(' ', '' , $f) ,  str_replace(' ', '' , $s)  );
    }

//                                                       
//                                                       
//    _ __ ___    ___  ___  ___   __ _   __ _   ___  ___ 
//   | '_ ` _ \  / _ \/ __|/ __| / _` | / _` | / _ \/ __|
//   | | | | | ||  __/\__ \\__ \| (_| || (_| ||  __/\__ \
//   |_| |_| |_| \___||___/|___/ \__,_| \__, | \___||___/
//                                       __/ |           
//                                      |___/            
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

//        _                            _                            _        
//       | |                          | |                          | |       
//     __| |  ___  _ __    __ _  _ __ | |_  _ __ ___    ___  _ __  | |_  ___ 
//    / _` | / _ \| '_ \  / _` || '__|| __|| '_ ` _ \  / _ \| '_ \ | __|/ __|
//   | (_| ||  __/| |_) || (_| || |   | |_ | | | | | ||  __/| | | || |_ \__ \
//    \__,_| \___|| .__/  \__,_||_|    \__||_| |_| |_| \___||_| |_| \__||___/
//                | |                                                        
//                |_|                                                        

function getDepartments(){
      $q =  "select * from departments";
                $r = mysql_query($q);
                $d = "";
                while( $row = mysql_fetch_assoc($r)){
                   $d .=  "<tr>
                    <td>".$row['name']."</td>
                        <td><form method='post'> <button class='btn btn-danger' name='del_dep' value ='".$row['id']."'>Delete</button> <input style=\"display:none\" type=\"text\" name=\"dep_toggle\" value=\"in\" /> </form></td>
                        <td><button class='btn btn-default' onclick='edit_department(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#department_edit_modal'>Edit</button></td>
                       
                    </tr>";
                }
                return $d;
}


function addDepartment($name){
    $created_date = date("Y-m-d H:i:s");
    
     $q =  "select * from departments where name = '".mysql_real_escape_string($name)."'; ";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
               
            if($rows < 1){
 
    $q =  "insert into departments( id , name , created , updated ) values ('' , '".mysql_real_escape_string($name)."' , '".$created_date."' , '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                    success("New Department has been added");
                }else{
                    error("Something went wrong");
                }}else{
                 error("Duplicate entry not allowed");
            }
}
function delDepartment($id){
    $q =  "delete from departments where id =  '".mysql_real_escape_string($id)."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}

function updateDepartment($name , $id){
    

    $q =  "update departments set name =  '".mysql_real_escape_string($name)."'  where id = '".mysql_real_escape_string($id)."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Department edited Successfully");
                }else{
                    error("Something went wrong!");
                }
              
}


//        _                               
//       | |                              
//     __| |  ___   __ _  _ __  ___   ___ 
//    / _` | / _ \ / _` || '__|/ _ \ / _ \
//   | (_| ||  __/| (_| || |  |  __/|  __/
//    \__,_| \___| \__, ||_|   \___| \___|
//                  __/ |                 
//                 |___/                  


function addDegree($deg_name , $dep_id){
    $created_date = date("Y-m-d H:i:s");
 
     $q =  "select * from degrees where name = '".mysql_real_escape_string($deg_name)."' and dep_id='".mysql_real_escape_string($dep_id)."'; ";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
               
            if($rows < 1){
 
    $q =  "insert into degrees( id , name , dep_id , created  ) values ('' , '".$deg_name."'  ,'".$dep_id."' ,  '".$created_date."' ) ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Degree has been added");
                }else{
                  
                    error("Something went wrong");
                }
                }else{
                 error("Duplicate entry not allowed");
            }
}

function delDegree($id){
    $q =  "delete from degrees where id =  '".mysql_real_escape_string($id)."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}

function updateDegree($id , $deg_name , $dep_id){
    

    $q =  "update degrees set name =  '".$deg_name."' , dep_id = '".$dep_id."' where id = '".mysql_real_escape_string($id)."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Degree Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
              
}

//     _____                  _               
//    / ____|                (_)              
//   | (___    ___  ___  ___  _   ___   _ __  
//    \___ \  / _ \/ __|/ __|| | / _ \ | '_ \ 
//    ____) ||  __/\__ \\__ \| || (_) || | | |
//   |_____/  \___||___/|___/|_| \___/ |_| |_|
//                                            
//                                                                    

function addSession( $sess_name , $start , $end , $deg_id){
         $created_date = date("Y-m-d H:i:s");
         $q =  "select * from sessions where name = '".mysql_real_escape_string($sess_name)."'  and start = '".mysql_real_escape_string($start)."' and end ='".mysql_real_escape_string($end)."' and deg_id ='".mysql_real_escape_string($deg_id)."'; ";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
               
            if($rows < 1){
 
    $q =  "insert into sessions( id , name , start , end , deg_id , created  ) values ('' , '".$sess_name."'  ,'".$start."' ,  '".$end."' , '".$deg_id."'  , '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Session has been added");
                }else{
                  
                    error("Something went wrong");
                }
            }else{
                 error("Duplicate entry not allowed");
            }
    
}   


function delSession($id){
    $q =  "delete from sessions where id =  '".mysql_real_escape_string($id)."' ; ";
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


//     _____  _           __   __ 
//    / ____|| |         / _| / _|
//   | (___  | |_  __ _ | |_ | |_ 
//    \___ \ | __|/ _` ||  _||  _|
//    ____) || |_| (_| || |  | |  
//   |_____/  \__|\__,_||_|  |_|  
//                                
//                                                           


function addStaff( $name , $dep_id){
        
            $created_date = date("Y-m-d H:i:s");
            $q =  "select * from staff where name = '".mysql_real_escape_string($name)."'  and dep_id = '".mysql_real_escape_string($dep_id)."'; ";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
               
            if($rows < 1){
 
              $q =  "insert into staff( id , name , dep_id , created  ) values ('' , '".mysql_real_escape_string($name)."'  ,'".$dep_id."', '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Session has been added");
                }else{
                  
                    error("Something went wrong");
                } 
            }else{
                 error("Duplicate entry not allowed");
            }
    
}

function delStaff($id){
    $q =  "delete from staff where id =  '".mysql_real_escape_string($id)."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}


function updateStaff($id , $name , $dep_id){
    

    $q =  "update staff set name =  '".mysql_real_escape_string($name)."' ,  dep_id = '".$dep_id."' where id = '".mysql_real_escape_string($id)."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Degree Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
              
}





//     _____              _    _               
//    / ____|            | |  (_)              
//   | (___    ___   ___ | |_  _   ___   _ __  
//    \___ \  / _ \ / __|| __|| | / _ \ | '_ \ 
//    ____) ||  __/| (__ | |_ | || (_) || | | |
//   |_____/  \___| \___| \__||_| \___/ |_| |_|
//                                             
//                                             

function addSection( $sec_id  , $deg_id , $sess_id){
        
            $created_date = date("Y-m-d H:i:s");
 
              $q =  "select * from sem_sec where sem_id = '".$sess_id."'  and sec_id = '$sec_id'  and deg_id = '$deg_id'";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
            if($rows < 1){
              $q =  "insert into sem_sec( id , sem_id , sec_id, deg_id , created  ) values ('' , '".$sess_id."'  , '".$sec_id."'  ,'".$deg_id."', '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Section has been added");
                }else{
                  
                    error("Something went wrong");
                }
            }else{
                 error("Duplicate entry not allowed");
            }
    
}


function delSection($id){
    $q =  "delete from sem_sec where id =  '".mysql_real_escape_string($id)."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}

function updateSection( $id ,$sec_id  , $deg_id , $sess_id){
     $q =  "select * from sem_sec where sem_id = '".$sess_id."'  and sec_id = '$sec_id'  and deg_id = '$deg_id'";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
            if($rows < 1){

    $q =  "update sem_sec set sec_id =  '".$sec_id."' ,  deg_id = '".$deg_id."' , sem_id = '".$sess_id."'  where id = '".mysql_real_escape_string($id)."' ";
    
                  $check = mysql_query($q);
                if($check ){
                    success("Section Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
            }else{
                error("Duplicate entry not allowed");
            }
              
}






//     _____              _    _                  _____         _      _              _   
//    / ____|            | |  (_)                / ____|       | |    (_)            | |  
//   | (___    ___   ___ | |_  _   ___   _ __   | (___   _   _ | |__   _   ___   ___ | |_ 
//    \___ \  / _ \ / __|| __|| | / _ \ | '_ \   \___ \ | | | || '_ \ | | / _ \ / __|| __|
//    ____) ||  __/| (__ | |_ | || (_) || | | |  ____) || |_| || |_) || ||  __/| (__ | |_ 
//   |_____/  \___| \___| \__||_| \___/ |_| |_| |_____/  \__,_||_.__/ | | \___| \___| \__|
//                                                                   _/ |                 
//                                                                  |__/                  


function addSectionSubject( $sem_sec_id  , $sub_id , $staff_id){
        
            $created_date = date("Y-m-d H:i:s");
 
              $q =  "select * from sec_subs where sem_sec_id = '".$sem_sec_id."'  and sub_id = '$sub_id'";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
            if($rows < 1){
              $q =  "insert into sec_subs( id , sem_sec_id , sub_id, staff_id , created  ) values ('' , '".$sem_sec_id."'  , '".$sub_id."'  ,'".$staff_id."', '".$created_date."') ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Subject to Section has been added");
                }else{
                  
                    error("Something went wrong");
                }
            }else{
                 error("Duplicate entry not allowed");
            }
    
}





function delSubject_sec($id){
    $q =  "delete from sec_subs where id =  '".mysql_real_escape_string($id)."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}

function updateSubject_sec( $id , $sub_id , $staff_id){
   
       
              $q =  "update sec_subs set  sub_id = '".$sub_id."' , staff_id = '".$staff_id."' where id = '".mysql_real_escape_string($id)."' ";
               // echo $q;
                $check = mysql_query($q);
               
                if($check){
                    success("Section Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
           
}



//     _____         _      _              _   
//    / ____|       | |    (_)            | |  
//   | (___   _   _ | |__   _   ___   ___ | |_ 
//    \___ \ | | | || '_ \ | | / _ \ / __|| __|
//    ____) || |_| || |_) || ||  __/| (__ | |_ 
//   |_____/  \__,_||_.__/ | | \___| \___| \__|
//                        _/ |                 
//                       |__/                  

function getSubjects(){
         $q =  "select * from all_subs";
                $r = mysql_query($q);
                $d = "";
                while( $row = mysql_fetch_assoc($r)){
                   $d .=  "<tr>
                    <td>".$row['code']."</td>
                    <td>".$row['Name']."</td>
                    <td>".getDepName($row['dep_id'])[0]."</td>
                        <td><form method='post'> <button class='btn btn-danger' name='del_subb' value ='".$row['id']."'>Delete</button> </form></td>
                        <td><button class='btn btn-default' onclick='edit_subs(this.name)' name='".$row['id']."' data-toggle='modal' data-target='#sub_edit_modal'>Edit</button></td>
                    </tr>";
                }
                return $d;
}


function addSubject( $code  , $name , $dep_id){
        
            $created_date = date("Y-m-d H:i:s");
 
              $q =  "select * from all_subs where code = '".$code."'  and Name = '".mysql_real_escape_string($name)."' and dep_id='".$dep_id."'; ";
                
                $check = mysql_query($q);
                $rows = mysql_num_rows($check);
               
            if($rows < 1){
              $q =  "insert into all_subs( id , code , Name, dep_id , created  ) values ('' , '".$code."'  , '".mysql_real_escape_string($name)."'  ,'".$dep_id."', '".$created_date."' ) ; ";
                
                $check = mysql_query($q);
                if($check ){
                
                    success("New Subject  has been added");
                }else{
                  
                    error("Something went wrong");
                }
            }else{
                 error("Duplicate entry not allowed");
            }
    
    
    
}

function delSubject($id){
    $q =  "delete from all_subs where id =  '".mysql_real_escape_string($id)."' ; ";
               // echo $q;
                $check = mysql_query($q);
                if($check ){
                    success("Deleted");
                }else{
                    error("Something went wrong");
                }
}


function updateSubject( $id , $code  , $name , $dep_id){
   
       
              $q =  "update all_subs set  code = '".$code."' ,dep_id = '".$dep_id."' , Name= '".mysql_real_escape_string($name)."' where id = '".mysql_real_escape_string($id)."' ";
               
                $check = mysql_query($q);
               
                if($check){
                    success("Subject Updated Successfully");
                }else{
                    error("Something went wrong!");
                }
           
}

?>
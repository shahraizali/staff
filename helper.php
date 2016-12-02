<?php
    
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


    //styling
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



?>
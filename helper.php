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
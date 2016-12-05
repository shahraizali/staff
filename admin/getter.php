<?php 

    if(@$_POST['file'])
      { 
            $file = $_POST['file'];
            $file  = str_replace(' ', '' , $file);
        echo include($file.".php");
    }
    if(@$_GET['file']){
        echo "<h1 style='text-align:center; margin-top:20%'> NOT smarter than me duh :)</h1>";
    }
        

?>
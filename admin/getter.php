<?php 
      if(isset($_SESSION['page_name']))
                 unset($_SESSION['page_name']);
            $_SESSION['page_name']='student';
    if(isset($_POST['file']))
      { 
            $file = $_POST['file'];
            $file  = str_replace(' ', '' , $file);
        echo include($file.".php");
    }
    if(isset($_GET['file']))
    {
        echo "<h1 style='text-align:center; margin-top:20%'> NOT smarter than me duh :)</h1>";
    }
        

?>
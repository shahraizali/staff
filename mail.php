<?php

    include_once('header2.php');


    echo "<div class='container'>";
    success("A confirmation email has been sent to your email address : ".isset($_SESSION['email'])."");
        unset($_SESSION['email']);
    echo "</div>";
    

    require("footer.php");
?>

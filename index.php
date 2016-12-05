<?php  include_once("header.php");?>

    <div class="container">
        <?php include_once("connection.php");?>
        <div class="row" style="padding-top :-20px;">
             
                <div class="col-xl-8" style="padding-left:20%; padding-right:20%;">
                    <?php
                     
                    
                    ?>
                    <form name="submit" method="post" >


                        <!-- selecting  Subjects -->

                        Select Subject
                        <select class="form-control" name="sub_selected" >    
                        <?php
                          $q = "select sub_id from sec_subs where sem_id = '".$data['sem_no']."' and sec_id= '".$data['sec_no']."' and dep_id =  '".$data['dep_id']."' ;";
                                $res = mysql_query($q);
                            while($sub =  mysql_fetch_array($res) ){
                                $selected =  "";
                                    if($_POST['sub_selected'] == getSubName($sub[0])[1]){
                                        $selected =  "selected";
                                    }
                                echo "<option ".$selected.">".getSubName($sub[0])[1]."</option>";
                            }
                            
                        ?>
                        </select>
                        <br>
                        <input class="btn btn-default" type="submit" name="submit" value="select" >
                    </form>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
            </div> 
        </div>
    </div>
    
    
    <!-- Page Content -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

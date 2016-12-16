<script type="text/javascript" >

   function update_dep(){
            console.log("lo g updating department");
            
    }
    
    </script>
<?php
		include_once('../../connection.php');
		include_once('../../helper.php');









// department data
        if(isset($_POST['dep_edit'])){ 
            $id = $_POST['dep_id'];
            $q = "select * from departments where id =  '".$id."' ; ";
        
             $r =  mysql_query($q);
             $data =  mysql_fetch_assoc($r);

            ?>
               
                    <input type="text" class="form-control" value="<?php echo $data['name'] ?>" name="name_of_dep" placeholder=" Name"/>
                    <br>
                    <button class='btn btn-success' name="update_dep" type="submit" value="<?= $id ?>" style="width:70px" > Update </button>
                   

            <?php


        }


// degree data
        if(isset($_POST['deg_edit'])){   
            $id = $_POST['deg_id'];
            $q = "select * from degrees where id =  '".$id."' ; ";
        
             $r =  mysql_query($q);
             $data =  mysql_fetch_assoc($r);
              ?>
                <form method="post">
                    Degree Name:
                    <input type="text" class="form-control" value="<?php echo $data['name'] ?>" name="deg_name" placeholder=" Name"/>
                    <br>
                        Departments
                        <select name="deg_selected" class="form-control">
                            <?php
                             $q =  "select * from departments";
                             $r = mysql_query($q);
                              echo "<option>None</option>";
                             while( $row = mysql_fetch_assoc($r)){
                                $selected =  "";
                                echo $row['name'] ." == ".getDepName($data['dep_id'])[0];
                                if( strcmp_s($row['name'] , getDepName( $data['dep_id'])[0] ) == 0 )
                                    {   
                                        $selected = "selected"; 
                                    }
                                echo "<option ".$selected." value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select>
                    <br>
                    <button class='btn btn-success' name="update_deg" value ="<?= $id ?>"  type="submit"  style="width:70px" > Update </button>
                    </form>

            <?php

        }


   // session data
   

        if(isset($_POST['sess_edit'])){       
                $sess_id =  $_POST['sess_id'];

                  $q = "select * from sessions where id =  '".$sess_id."' ; ";
        
             $r =  mysql_query($q);
             $data =  mysql_fetch_assoc($r);

            ?>
                
                <form method="post">
                    Name:
                     <input type="text" name="sess_name" class="form-control" value="<?= $data['name']; ?>" placeholder="Degree Name"/>
                     <br>
                    Start Year:
                    <input type="number" name="sess_start" pattern="[2][0][1-9][0-9]" value="<?= $data['start']; ?>" title="Enter correct year" class="form-control" placeholder="start date"/>
                    <br>
                    End Year:
                    <input type="number"  name="sess_end" pattern="[2][0][1-9][0-9]" value="<?= $data['end']; ?>" title="Enter correct year" class="form-control" placeholder="ending date"/>
                    <br>
                    Degree:
                    <select name="deg_selected" class="form-control">
                            <?php
                             $q =  "select * from degrees";
                             $r = mysql_query($q);
                             echo "<option>None</option>";
                             while( $row = mysql_fetch_assoc($r)){
                                $sel = "";
                                if( $row['name'] == getDegName($data['deg_id'])[0] )
                                    $sel = "selected";
                                echo "<option ".$sel." value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                    </select>
                        <br>
                    <button class='btn btn-info' type="submit" value="<?php echo $sess_id;?>" name='update_sess' style="width:70px" > Update </button>
                 </form>
            <?php
        }
        
          //  staff data
        		
		if(isset($_POST['staff_edit'])){    
			$id = $_POST['staff_id'];
			$q = "select * from staff where id =  '".$id."' ; ";
		
			 $r =  mysql_query($q);
			 $data =  mysql_fetch_assoc($r);

			?>
				<form method="post">
                    Name:
                    <input type="text" class="form-control" value="<?php echo $data['name'] ?>" name="staff_name" placeholder=" Name"/>
                    <br>
                    Department:
                    <select name="dep_selected" class="form-control">
                            <?php
                             $q =  "select * from departments";
                             $r = mysql_query($q);
                              echo "<option>None</option>";
                             while( $row = mysql_fetch_assoc($r)){
                             	$selected =  "";
                             	echo $row['name'] ." == ".getDepName($data['dep_id'])[0];
                             	if( strcmp_s($row['name'] , getDepName( $data['dep_id'])[0] ) == 0 )
                             		{	
                             			$selected = "selected";	
                             		}
                                echo "<option ".$selected." value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select>
                        <br>
                    <button class='btn btn-success' name="update_staff" value="<?=  $id?>" type="submit"  style="width:70px" > Update </button>
                    </form>

			<?php
		}

        

?>
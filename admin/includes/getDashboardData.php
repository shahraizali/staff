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
                        <input style="display:none" type="text" name="dep_toggle" value="in" />
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
                    <input style='display:none' type='text' name='deg_toggle' value='in' />
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
                    <input style='display:none' type='text' name='sess_toggle' value='in' />
                 </form>
            <?php
        }
        
          //  editing staff data
                
        if(isset($_POST['staff_edit'])) {    
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
                    <input style='display:none' type='text' name='staff_toggle' value='in' />
                    </form>


            <?php
        }
      
      
           //  editing section  data

        if(isset($_POST['sec_edit'])) {    
            $id = $_POST['sec_id'];
            $q = "select * from sem_sec where id =  '".$id."' ; ";
        
             $r =  mysql_query($q);
             $data =  mysql_fetch_assoc($r);

            ?>
                <form method="post">
                    Section Name:
                       <select name="sec_selected" class="form-control">
                            <?php
                             $q =  "select * from sections";
                             $r = mysql_query($q);
                              echo "<option>None</option>";
                             while( $row = mysql_fetch_assoc($r)){
                                $selected =  "";
                                echo $row['name'] ." == ".getSectionName($data['sec_id'])[0];
                                if( strcmp_s($row['name'] , getSectionName( $data['sec_id'])[0] ) == 0 )
                                    {   
                                        $selected = "selected"; 
                                    }
                                echo "<option ".$selected." value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select>
                    <br>
                    Degree:
               
                    <select name="deg_selected" class="form-control" onchange= "get_session_for_section_edit(this.value , <?= $data['sem_id']?>)" >
                            <?php
                             $q =  "select * from degrees";
                             $r = mysql_query($q);
                              echo "<option>None</option>";
                             while( $row = mysql_fetch_assoc($r)){
                                $selected =  "";
                                echo $row['name'] ." == ".getDegName($data['deg_id'])[0];
                                if( strcmp_s($row['name'] , getDegName( $data['deg_id'])[0] ) == 0 )
                                    {   
                                        $selected = "selected"; 
                                    }
                                echo "<option ".$selected." value='".$row['id']."'>".$row['name']."</option>";
                             }
                        ?>
                        </select>
                        <br>
                            Sessions:
               
                    <select name="sess_selected" class="form-control" id="sesss_for_sec" >
                          
                       <?php
                                 $q = "select * from sessions where deg_id = '".$data['deg_id']."' " ;
                                 $g =mysql_query($q);
                                 while( $r  = mysql_fetch_array($g) ){
                                        $selected =  "";
                                    echo    $r['name']." == ".getSessName($data['sem_id'])[0];
                                        if( $r['name'] == getSessName($data['sem_id'])[0] )
                                              $selected ="selected";
                                      echo "<option $selected value='".$r['id']."' >".$r['name']."</option>";
                                 }
                                      ?>
                                      
                       </select> 
                        <br>
                        
                    <button class='btn btn-success' name="update_section" value="<?=  $id?>" type="submit"   style="width:70px" > Update </button>
                     <input style='display:none' type='text' name='sec_toggle' value='in' />
                    </form>

            <?php
        }






    if(isset($_POST['sec_sub_edit'])){
                
        
        $id = $_POST['sec_sub_id'];
            ?>
            
                    Degree Session Section:
                    <br>
                    <?php
                     
                        $q_s =  "select * from sem_sec where id = '".$id."' ;";
                        $res = mysql_query($q_s);
                        $sem_sec_data =  mysql_fetch_assoc($res);
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>"
                            .strtoupper(getDegName($sem_sec_data['deg_id'])[0])." , ";
                        echo strtoupper(getSessName($sem_sec_data['sem_id'])[0])." , ";
                        echo strtoupper(getSectionName($sem_sec_data['sec_id'])[0])."</b>";
                    ?>
                    <br>
                          <form method="post">
                    <table class="table table-striped">
                        <thead>
                            <th>Subjects</th>
                            <th>Staff</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </thead>
                        <tbody> 
                          
                            <?php
                                $q  =  "select * from sec_subs where sem_sec_id  =  '".$id."' ; ";
                                $r  =  mysql_query($q);
                                while($data  =  mysql_fetch_assoc($r)){
                                    echo "<tr>
                                            <td>
                                                <select name='selected_subs' class='form-control'>";
                                                         $q  =  "select dep_id from degrees where id  =  '".$sem_sec_data['deg_id']."' ; ";
                                $r  =  mysql_query($q);
                               $dep_id  =  mysql_fetch_assoc($r);
                                            
                                                    $sub_q =  "SELECT * FROM `all_subs` WHERE dep_id =  '".$dep_id['dep_id']."'  ";
                                                    $res = mysql_query($sub_q);
                                                    while($d =  mysql_fetch_assoc($res)){
                                                        $sel = "";
                                                            if($data['sub_id'] == $d['id'] ){
                                                                    $sel = "selected";
                                                            }
                                                        echo '<option '.$sel.' value='.$d['id'].'  >'.$d['Name'].'</option>';    
                                                    }
                                                echo"</select>
                                             </td>
                                                <td>
                                                 <select name='selected_staff' class='form-control'>";
                                                    $sub_q =  "SELECT * FROM staff where dep_id = '".$dep_id['dep_id']."'";
                                                    $res = mysql_query($sub_q);
                                                    while($d =  mysql_fetch_assoc($res)){
                                                        $sel = "";
                                                            if($data['staff_id'] == $d['id'] ){
                                                                    $sel = "selected";
                                                            }
                                                        echo '<option '.$sel.' value='.$d['id'].' >'.$d['name'].'</option>';    
                                                    }
                                                echo"</select>
                                            </td>";   
                                        echo "<td><button class='btn btn-warning' name='update_subs' type='submit' value='".$data['id']."' >Update</button></td>";   
                                        echo "<td><button type='submit' class='btn btn-danger' name='del_sub' value='".$data['id']."'>Delete</button></td>";   
                                    echo "<tr>";    
                                }
                            
                            ?>
                                                      
                        </tbody>
                    </table>
                              <input style='display:none' type='text' name='sec_sub_toggle' value='in' />
            
</form>  
                            
                           
                        <br>
                        
                    
                 

            <?php

        
    }














        // getting sessions for putting in section while adding sectoins to sessions
      if(isset($_POST['get_sess_for_sec'])){
         $deg_id  = $_POST['deg_id'];
         
      
                     
                             $q =  "select * from sessions where deg_id = '".$deg_id."' " ;
                             $r = mysql_query($q);
                           
                             while( $row = mysql_fetch_assoc($r)){
                                echo "<option value='".$row['id']."'>".$row['name']."</option>";
                             }
                       
                     
      }
        
        if(isset($_POST['get_sess_for_sec_edit'])){
         $deg_id  = $_POST['deg_id'];
         $sem_id  = $_POST['sem_id'];
         
      
                     
                             $q =  "select * from sessions where deg_id = '".$deg_id."' " ;
                             $r = mysql_query($q);
                            
                             while( $row = mysql_fetch_assoc($r)){
                                 $selected = "";
                                 if($row['name'] == getSessName($sem_id)){
                                       $selected = "selected";
                                 }
                                echo "<option ".$selected." value='".$row['id']."'>".$row['name']."</option>";
                             }
                       
                     
      }

      if(isset($_POST['get_sub_for_sem_sec_id'])){
          $sem_sec_id  = $_POST['sem_sec_id'];
        
         
      
                     
                             $q =  "select dep_id  from degrees where id = (select deg_id from sem_sec where id = '".$sem_sec_id."') ; " ;
                             $r = mysql_query($q);
                               $dep_id =  mysql_fetch_assoc($r);
                               print_r($dep_id);
                              
                                $q =  "select * from all_subs where dep_id = '".$dep_id['dep_id']."' ; " ;
                             $r = mysql_query($q);
                              while( $sub =  mysql_fetch_assoc($r)){
                                
                              echo "<option ".$selected." value='".$sub['id']."'>".strtoupper($sub['code'])." =>  ".strtoupper($sub['Name'])."</option>"; 
                              }
                               
                             }
                       
                     
     

      if(isset($_POST['get_staff_for_sem_sec_id'])){
         $sem_sec_id  = $_POST['sem_sec_id'];
        
         
      
                       $q =  "select dep_id  from degrees where id = (select deg_id from sem_sec where id = '".$sem_sec_id."') ; " ;
                             $r = mysql_query($q);
                               $dep_id =  mysql_fetch_assoc($r);
                               print_r($dep_id);
                              
                                $q =  "select * from staff where dep_id = '".$dep_id['dep_id']."' ; " ;
                             $r = mysql_query($q);
                              while( $sub =  mysql_fetch_assoc($r)){
                                
                              echo "<option ".$selected." value='".$sub['id']."'>".$sub['name']."</option>"; 
                              }
                       
                     
      }




       if(isset($_POST['sub_edit'])) {    
            $id = $_POST['sub_id'];
            $q = "select * from all_subs where id =  '".$id."' ; ";
        
             $r =  mysql_query($q);
             $data =  mysql_fetch_assoc($r);

            ?>
                <form method="post">
                    Code:
                    <input type="text" class="form-control" value="<?php echo $data['code'] ?>" name="sub_code" placeholder=" Subjec Code"/>
                    <br>
                    Name:
                    <input type="text" class="form-control" value="<?php echo $data['Name'] ?>" name="sub_name" placeholder=" Subjec Code"/>
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
                    <button class='btn btn-success' name="update_sub" value="<?=  $id?>" type="submit"  style="width:70px" > Update </button>
                    </form>


            <?php
        }
        

?>